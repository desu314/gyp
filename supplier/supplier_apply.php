<?php
/**
 * YNDTH 入驻商信息
 * ============================================================================
 * $Author: yehuaixiao $
 * $Id: order.php 17219 2011-01-27 10:49:19Z yehuaixiao $
 */

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . 'languages/' . $_CFG['lang'] . '/supplier_apply.php');
$_LANG = $GLOBALS['_LANG'];
/*------------------------------------------------------ */
//-- 入驻商店铺信息
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'info')
{
    ini_set('display_errors',1);
    $suppliers = array();

    /* 取得供货商信息 */
    $id = $_SESSION['supplier_id'];
    $sql = "SELECT * FROM " . $ecs->table('supplier') . " WHERE supplier_id = '$id'";
    $supplier = $db->getRow($sql);

    if (count($supplier) <= 0)
    {
        sys_msg($_LANG['supplier_error']);
    }

    /* 省市县 */
    $supplier_country = $supplier['country'] ?  $supplier['country'] : $_CFG['shop_country'];
    $smarty->assign('country_list',       get_regions());
    $smarty->assign('province_list', get_regions(1, $supplier_country));
    $smarty->assign('city_list', get_regions(2, $supplier['province']));
    $smarty->assign('district_list', get_regions(3, $supplier['city']));
    $smarty->assign('supplier_country', $supplier_country);
    /* 供货商等级 */
    $sql="select rank_name from ". $ecs->table('supplier_rank') ." where rank_id = ".$supplier['rank_id'];
    $rank_name=$db->getOne($sql);
    $supplier['rank_name'] = $rank_name;

    /* 店铺类型 */

    $sql="select str_id,str_name from ". $ecs->table('street_category') ." where is_show=1 order by sort_order";
    $supplier_type=$db->getAll($sql);
    $smarty->assign('supplier_type', $supplier_type);

    $smarty->assign('ur_here', $_LANG['edit_supplier']);

    $smarty->assign('form_action', 'update');
    $smarty->assign('supplier', $supplier);
    // 商品等级
    $smarty->assign('rank_id', $supplier['rank_id']);
    $smarty->assign('supplier_rank_list', get_supplier_rank_list());

    assign_query_info();

    $smarty->display('supplier_info.htm');
}

/*------------------------------------------------------ */
//-- 提交添加、编辑供货商
/*------------------------------------------------------ */
elseif ($_REQUEST['act']=='update')
{
    require_once('../includes/lib_main.php');
    /* 检查权限
    admin_priv('supplier_manage');*/
    //ini_set('display_errors',1);
    $upload_size_limit = $_CFG['upload_size_limit'] == '-1' ? ini_get('upload_max_filesize') : $_CFG['upload_size_limit'];
    /* 提交值 */
    $supplier_id =  intval($_POST['supplier_id']);
    if (isset($_FILES['zhizhao']) && $_FILES['zhizhao']['tmp_name'] != '' &&  isset($_FILES['zhizhao']['tmp_name']) && $_FILES['zhizhao']['tmp_name'] != 'none')
    {
        if($_FILES['zhizhao']['size'] / 1024 > $upload_size_limit)
        {
            $err->add(sprintf($_LANG['upload_file_limit'], $upload_size_limit));
            $err->show($_LANG['back_up_page']);
        }
        $zhizhao_img = upload_file($_FILES['zhizhao'], 'supplier');
        if ($zhizhao_img === false)
        {
            $err->add('营业执照号电子版图片上传失败！');
            $err->show($_LANG['back_up_page']);
        }
        else
        {
            $zhizhao = $zhizhao_img;
        }
    }

    if (isset($_FILES['bank_licence_electronic']) && $_FILES['bank_licence_electronic']['tmp_name'] != '' &&  isset($_FILES['bank_licence_electronic']['tmp_name']) && $_FILES['bank_licence_electronic']['tmp_name'] != 'none')
    {
        if($_FILES['bank_licence_electronic']['size'] / 1024 > $upload_size_limit)
        {
            $err->add(sprintf($_LANG['upload_file_limit'], $upload_size_limit));
            $err->show($_LANG['back_up_page']);
        }
        $bank_licence_electronic_img = upload_file($_FILES['bank_licence_electronic'], 'supplier');
        if ($bank_licence_electronic_img === false)
        {
            $err->add('开户银行许可证电子版图片上传失败！');
            $err->show($_LANG['back_up_page']);
        }
        else
        {
            $bank_licence_electronic = $bank_licence_electronic_img;
        }
    }

    $supplier = array(
        'company_name' => trim($_POST['company_name']),
        'country'   => intval($_POST['country']),
        'province'   => intval($_POST['province']),
        'city'   => intval($_POST['city']),
        'district'   => intval($_POST['district']),
        'address'   => trim($_POST['address']),
        'tel'   => trim($_POST['tel']),
        'guimo' => trim($_POST['guimo']),
        'company_type' => trim($_POST['company_type']),
        'contacts_name' => trim($_POST['contacts_name']),
        'contacts_phone' => trim($_POST['contacts_phone']),
        'email'   => trim($_POST['email']),
        'business_licence_number' => trim($_POST['business_licence_number']),
        'business_sphere' => trim($_POST['business_sphere']),
        'tax_registration_certificate' => trim($_POST['tax_registration_certificate']),
        'taxpayer_id' => trim($_POST['taxpayer_id']),
        'bank_account_name'	=>	trim($_POST['bank_account_name']),
        'bank_account_number'	=>	trim($_POST['bank_account_number']),
        'bank_name'	=>	trim($_POST['bank_name']),
        'bank_code'	=>	trim($_POST['bank_code']),
        'settlement_bank_account_name'	=>	trim($_POST['settlement_bank_account_name']),
        'settlement_bank_account_number'	=>	trim($_POST['settlement_bank_account_number']),
        'settlement_bank_name'	=>	trim($_POST['settlement_bank_name']),
        'settlement_bank_code'	=>	trim($_POST['settlement_bank_code']),
        'supplier_name' => trim($_POST['supplier_name']),
        'type_id' => trim($_POST['type_id'])
    );
    /* 取得供货商信息 */
    $sql = "select s.supplier_id,s.add_time,s.status,u.* from " . $ecs->table('supplier') . " as s left join ". $ecs->table('users') .
        " as u on s.user_id=u.user_id where s.supplier_id=".$supplier_id;
    $supplier_old = $db->getRow($sql);
    if (empty($supplier_old['supplier_id']))
    {
        sys_msg($_LANG['supplier_error']);
    }
    //根据所填信息查询当前商家是否改变信息
    foreach($supplier as $key=>$val){
        $supplierSql .= '`'.$key.'` = '."'".$val."' and ";
    }
    $supplierSql = substr($supplierSql,0,strlen($supplierSql)-4);
    $supplierSql = "select * from ".$ecs->table('supplier')." where ".$supplierSql;
    $supplierInfo = $db->getRow($supplierSql);
    //如果所填信息搜索出来为空，说明有变动
    if(empty($supplierInfo)){
        $sql = "update ".$ecs->table('supplier')." set ";
        foreach($supplier as $key=>$val){
            $sql .= '`'.$key.'` = '."'".$val."',";
        }
        if($zhizhao != ''){
            $sql .= "`zhizhao` = '" . $zhizhao . "',";
        }
        if($bank_licence_electronic != ''){
            $sql .= "`bank_licence_electronic` = '" . $bank_licence_electronic . "',";
        }
        $sql = substr($sql,0,strlen($sql)-1);
        $sql .= " where `supplier_id` = "."'".$supplier_id."'";
        if($db->query($sql)){
            $upStatusSql = "update " . $ecs->table('supplier') . " set status = 0 where supplier_id = ".$supplier_id;
            $db->query($upStatusSql);
            //审核不通过
            //店铺街信息失效
            $check_info = array(
                'is_groom' => 0,
                'is_show' => 0,
                'supplier_notice' => '',
                'status' => 0
            );
            $db->autoExecute($ecs->table('supplier_street'), $check_info, 'UPDATE', "supplier_id = '" . $supplier_id . "'");
            //商品下架
            $good_info = array(
                'is_on_sale' => 0
            );
            $db->autoExecute($ecs->table('goods'), $good_info, 'UPDATE', "supplier_id = '" . $supplier_id . "'");
            //删除店铺所在的标签
            $db->query('delete FROM '.$ecs->table('supplier_tag_map').' WHERE supplier_id = '.$supplier_id);
            /**
             * 查找入驻商店铺设置，如果存在，则修改店铺名称
             */
            $sql = "select * from ". $ecs->table('supplier_shop_config') ." where supplier_id=".$supplier_old['supplier_id'];
            $shopConfig = $db->getAll($sql);
            if(!empty($shopConfig)){
                /*修改店铺信息*/
                $sql = "update ". $ecs->table('supplier_shop_config') ." set value = '".$_POST['supplier_name']."' where code = 'shop_name' or code = 'shop_title' and supplier_id = ".$supplier_id;
                $db->query($sql);
            }
            //该店铺商品全部下架
            $sql="update ". $ecs->table('goods') ." set is_on_sale=0 where supplier_id='$supplier_id' ";
            $db->query($sql);
            /* 修改成功提示信息 */
            $links[] = array('href' => ('supplier_apply.php?act=info'), 'text' => ($_LANG['back_up_page']));
            sys_msg($_LANG['edit_supplier_ok'], 0, $links);
        }else{
            /* 修改失败提示信息 */
            $links[] = array('href' => ('supplier_apply.php?act=info'), 'text' => ($_LANG['back_up_page']));
            sys_msg($_LANG['edit_supplier_error'], 0, $links);
        }
    }
    //如果信息不为空，上传的文件其中一个不为空
    elseif(!empty($supplierInfo) && ($zhizhao != '' || $bank_licence_electronic != '')){
        $sql = "update ".$ecs->table('supplier')." set ";
        if($zhizhao != ''){
            $sql .= "`zhizhao` = '" . $zhizhao . "',";
        }
        if($bank_licence_electronic != ''){
            $sql .= "`bank_licence_electronic` = '" . $bank_licence_electronic . "',";
        }
        $sql = substr($sql,0,strlen($sql)-1);
        $sql .= " where `supplier_id` = "."'".$supplier_id."'";
        if($db->query($sql)){
            $upStatusSql = "update " . $ecs->table('supplier') . " set status = 0 where supplier_id = ".$supplier_id;
            $db->query($upStatusSql);
            //审核不通过
            //店铺街信息失效
            $check_info = array(
                'is_groom' => 0,
                'is_show' => 0,
                'supplier_notice' => '',
                'status' => 0
            );
            $db->autoExecute($ecs->table('supplier_street'), $check_info, 'UPDATE', "supplier_id = '" . $supplier_id . "'");
            //商品下架
            $good_info = array(
                'is_on_sale' => 0
            );
            $db->autoExecute($ecs->table('goods'), $good_info, 'UPDATE', "supplier_id = '" . $supplier_id . "'");
            //删除店铺所在的标签
            $db->query('delete FROM '.$ecs->table('supplier_tag_map').' WHERE supplier_id = '.$supplier_id);
            /**
             * 查找入驻商店铺设置，如果存在，则修改店铺名称
             */
            $sql = "select * from ". $ecs->table('supplier_shop_config') ." where supplier_id=".$supplier_old['supplier_id'];
            $shopConfig = $db->getAll($sql);
            if(!empty($shopConfig)){
                /*修改店铺信息*/
                $sql = "update ". $ecs->table('supplier_shop_config') ." set value = '".$_POST['supplier_name']."' where code = 'shop_name' or code = 'shop_title' and supplier_id = ".$supplier_id;
                $db->query($sql);
            }
            //该店铺商品全部下架
            $sql="update ". $ecs->table('goods') ." set is_on_sale=0 where supplier_id='$supplier_id' ";
            $db->query($sql);
            /* 修改成功提示信息 */
            $links[] = array('href' => ('supplier_apply.php?act=info'), 'text' => ($_LANG['back_up_page']));
            sys_msg($_LANG['edit_supplier_ok'], 0, $links);
        }else{
            /* 修改失败提示信息 */
            $links[] = array('href' => ('supplier_apply.php?act=info'), 'text' => ($_LANG['back_up_page']));
            sys_msg($_LANG['edit_supplier_error'], 0, $links);
        }
    }
    else{
        /* 未做修改提示信息 */
        $links[] = array('href' => ('supplier_apply.php?act=info'), 'text' => ($_LANG['back_up_page']));
        sys_msg($_LANG['edit_supplier_no'], 0, $links);
    }

    /* 清除缓存 */
    clear_cache_files();
}

/**
 * 取得店铺等级列表
 * @return array 店铺等级列表 id => name
 */
function get_supplier_rank_list()
{
    $sql = 'SELECT rank_id, rank_name FROM ' . $GLOBALS['ecs']->table('supplier_rank') . ' ORDER BY sort_order';
    $res = $GLOBALS['db']->getAll($sql);

    $rank_list = array();
    foreach ($res AS $row)
    {
        $rank_list[$row['rank_id']] = addslashes($row['rank_name']);
    }

    return $rank_list;
}

?>