<?php
/**
 * YNDTH 入驻商信息
 * ============================================================================
 * $Author: yehuaixiao $
 * $Id: order.php 17219 2011-01-27 10:49:19Z yehuaixiao $
 */

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

/*------------------------------------------------------ */
//-- 店铺说明 文章
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'info')
{
    $suppliers = array();

    /* 取得供货商信息 */
    $id = $_SESSION['supplier_id'];
    $sql = "SELECT * FROM " . $ecs->table('supplier') . " WHERE supplier_id = '$id'";
    $supplier = $db->getRow($sql);

    if (count($supplier) <= 0)
    {
        sys_msg('该供应商不存在！');
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
    $sql="select str_name from ". $ecs->table('street_category') ." where str_id = ".$supplier['type_id'];
    $type_name=$db->getOne($sql);
    $supplier['type_name'] = $type_name;

    $smarty->assign('ur_here', $_LANG['edit_supplier']);
    if ($_REQUEST['status'] == '1')
    {
        $lang_supplier_list = $_LANG['supplier_list'];
    }
    else
    {
        $lang_supplier_list = $_LANG['supplier_reg_list'];
    }

    $smarty->assign('form_action', 'update');
    $smarty->assign('supplier', $supplier);
    // 商品等级
    $smarty->assign('rank_id', $supplier['rank_id']);
    $smarty->assign('supplier_rank_list', get_supplier_rank_list());

    assign_query_info();

    $smarty->display('suppliers_info.htm');
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