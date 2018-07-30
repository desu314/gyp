<?php

/**
 * YNDTH 专题前台
 * ============================================================================
 * @author:     webboy <laupeng@163.com>
 * @version:    v2.1
 * ---------------------------------------------
 */

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

if ((DEBUG_MODE & 2) != 2)
{
	$smarty->caching = true;
}

if (empty($_SESSION['user_id'])){
	$back_act = "apply_index.php";
	if (!empty($_SERVER['QUERY_STRING']))
	{
		$back_act = 'apply.php?' . strip_tags($_SERVER['QUERY_STRING']);
	}
	show_message('请先登陆！', array('返回上一页','点击去登陆'), array($back_act, 'user.php'), 'info');
}

$userid = $_SESSION['user_id'];

$shownum = (isset($_REQUEST['shownum'])) ? intval($_REQUEST['shownum']) : 0;

$upload_size_limit = $_CFG['upload_size_limit'] == '-1' ? ini_get('upload_max_filesize') : $_CFG['upload_size_limit'];

if(isset($_POST['do']) && $_POST['do']){
	unset($apply,$save);
	if($shownum == 1){
		if($_POST['company'])
		{
			$save['company_name'] = isset($_POST['company_name']) ? trim(addslashes(htmlspecialchars($_POST['company_name']))) : '';
			$save['country'] = isset($_POST['country']) ? intval($_POST['country']) : 1;
			$save['province'] = isset($_POST['province']) ? intval($_POST['province']) : 1;
			$save['city'] = isset($_POST['city']) ? intval($_POST['city']) : 1;
			$save['district'] = isset($_POST['district']) ? intval($_POST['district']) : 1;
			$save['address'] = isset($_POST['address']) ? trim(addslashes(htmlspecialchars($_POST['address']))) : '';
			$save['tel'] = isset($_POST['tel']) ? trim(addslashes(htmlspecialchars($_POST['tel']))) : '';
			$save['guimo'] = isset($_POST['guimo']) ? trim(addslashes(htmlspecialchars($_POST['guimo']))) : '';
			$save['email'] = isset($_POST['email']) ? trim($_POST['email']) : '';
			$save['company_type'] = isset($_POST['company_type']) ? trim($_POST['company_type']) : '';
			$save['contacts_name'] = isset($_POST['contacts_name']) ? trim(addslashes(htmlspecialchars($_POST['contacts_name']))) : '';
			$save['contacts_phone'] = isset($_POST['contacts_phone']) ? trim(addslashes(htmlspecialchars($_POST['contacts_phone']))) : '';
			$save['business_licence_number'] = isset($_POST['business_licence_number']) ? trim(addslashes(htmlspecialchars($_POST['business_licence_number']))) : '';
			$save['business_sphere'] = isset($_POST['business_sphere']) ? trim(addslashes(htmlspecialchars($_POST['business_sphere']))) : '';
			//$save['organization_code'] = isset($_POST['organization_code']) ? trim(addslashes(htmlspecialchars($_POST['organization_code']))) : '';

			if (isset($_FILES['zhizhao0']) && $_FILES['zhizhao0']['tmp_name'] != '' &&  isset($_FILES['zhizhao0']['tmp_name']) && $_FILES['zhizhao0']['tmp_name'] != 'none')
			{
				if($_FILES['zhizhao0']['size'] / 1024 > $upload_size_limit)
				{
					$err->add(sprintf($_LANG['upload_file_limit'], $upload_size_limit));
					$err->show($_LANG['back_up_page']);
				}
				$zhizhao_img = upload_file($_FILES['zhizhao0'], 'supplier');
				if ($zhizhao_img === false)
				{
					$err->add('营业执照号电子版图片上传失败！');
					$err->show($_LANG['back_up_page']);
				}
				else
				{
					$save['zhizhao'] = $zhizhao_img;
				}
			}
			$save['applynum'] = 1;//公司信息认证一

			//必填项验证
			$save1 = array_filter($save);
			if(count($save1)!=count($save)){
				show_message('请认真填写必填申请资料！', '返回', 'apply.php', 'wrong');
			}
			if ($db->autoExecute($ecs->table('supplier'), $save, 'UPDATE', 'user_id='.$userid) !== false){
				header("location:apply.php");
				exit;
			}else{
				show_message('操作失败！', '返回', 'apply.php', 'wrong');
			}
		}

	}elseif($shownum == 2){
		$save['bank_account_name'] = isset($_POST['bank_account_name']) ? trim(addslashes(htmlspecialchars($_POST['bank_account_name']))) : '';
		$save['bank_account_number'] = isset($_POST['bank_account_number']) ? trim(addslashes(htmlspecialchars($_POST['bank_account_number']))) : '';
		$save['bank_name'] = isset($_POST['bank_name']) ? trim(addslashes(htmlspecialchars($_POST['bank_name']))) : '';
		$save['bank_code'] = isset($_POST['bank_code']) ? trim(addslashes(htmlspecialchars($_POST['bank_code']))) : '';
		$save['settlement_bank_account_name'] = isset($_POST['settlement_bank_account_name']) ? trim(addslashes(htmlspecialchars($_POST['settlement_bank_account_name']))) : '';
		$save['settlement_bank_account_number'] = isset($_POST['settlement_bank_account_number']) ? trim(addslashes(htmlspecialchars($_POST['settlement_bank_account_number']))) : '';
		$save['settlement_bank_name'] = isset($_POST['settlement_bank_name']) ? trim(addslashes(htmlspecialchars($_POST['settlement_bank_name']))) : '';
		$save['settlement_bank_code'] = isset($_POST['settlement_bank_code']) ? trim(addslashes(htmlspecialchars($_POST['settlement_bank_code']))) : '';

		if (isset($_FILES['bank_licence_electronic0']) && $_FILES['bank_licence_electronic0']['tmp_name'] != '' &&  isset($_FILES['bank_licence_electronic0']['tmp_name']) && $_FILES['bank_licence_electronic0']['tmp_name'] != 'none')
		{
			if($_FILES['bank_licence_electronic0']['size'] / 1024 > $upload_size_limit)
			{
				$err->add(sprintf($_LANG['upload_file_limit'], $upload_size_limit));
				$err->show($_LANG['back_up_page']);
			}
			$bank_licence_electronic_img = upload_file($_FILES['bank_licence_electronic0'], 'supplier');
			if ($bank_licence_electronic_img === false)
			{
				$err->add('开户银行许可证电子版图片上传失败！');
				$err->show($_LANG['back_up_page']);
			}
			else
			{
				$save['bank_licence_electronic'] = $bank_licence_electronic_img;
			}
		}

		$save['applynum'] = 2;//公司信息认证二

		//必填项验证
		$save1 = array_filter($save);
		if(count($save1)!=count($save)){
			show_message('请认真填写必填申请资料！', '返回', 'apply.php', 'wrong');
		}

		if ($db->autoExecute($ecs->table('supplier'), $save, 'UPDATE', 'user_id='.$userid) !== false){
			header("location:apply.php");
			exit;
		}else{
			show_message('操作失败！', '返回', 'apply.php', 'wrong');
		}

	}elseif($shownum == 3){
		print_r($_POST);die;
		$save['supplier_name'] = isset($_POST['supplier_name']) ? trim(addslashes(htmlspecialchars($_POST['supplier_name']))) : '';
		$save['rank_id'] = isset($_POST['rank_id']) ? intval($_POST['rank_id']) : 0;
		$save['type_id'] = isset($_POST['type_id']) ? intval($_POST['type_id']) : 0;

		$save['applynum'] = 3;//店铺信息设置
		/*/查询是否缴费成功
		include_once(ROOT_PATH . 'includes/lib_payment.php');
		$is_paid = get_rank_paid($userid);
		if(empty($is_paid)){
			show_message('请先缴纳服务费！', '返回', 'apply.php');
		}*/
		//必填项验证
		$save1 = array_filter($save);
		if(count($save1)!=count($save)){
			show_message('请认真填写必填申请资料！', '返回', 'apply.php', 'wrong');
		}

		if ($db->autoExecute($ecs->table('supplier'), $save, 'UPDATE', 'user_id='.$userid) !== false){
			header("location:apply.php");
			exit;
		}else{
			show_message('操作失败！', '返回', 'apply.php', 'wrong');
		}

	}else{//同意入驻协议
		if(isset($_POST['input_apply_agreement']) && intval($_POST['input_apply_agreement']) > 0){

			$sql = "select * from ".$ecs->table('supplier')." where user_id=".$userid." limit 1";
			$info = $db->getRow($sql);

			$apply['user_id'] = $userid;
			$apply['status'] = 0;
			$apply['applynum'] = 0;//同意入驻协议
			if($info){
				if ($db->autoExecute($ecs->table('supplier'), $apply, 'UPDATE', 'user_id='.$userid) !== false){
					header("location:apply.php");
					exit;
				}else{
					show_message('请点击同意入驻协议！', '返回', 'apply.php', 'wrong');
				}
			}else{
				if ($db->autoExecute($ecs->table('supplier'), $apply) !== false){
					header("location:apply.php");
					exit;
				}else{
					show_message('请点击同意入驻协议！', '返回', 'apply.php', 'wrong');
				}
			}
		}else{
			$err->add('请点击同意入驻协议！');
			$err->show($_LANG['back_up_page']);
		}
	}
}


if (!$smarty->is_cached($templates, $cache_id))
{

	/* 模板赋值 */
	assign_template();
	$position = assign_ur_here();
	//print_r($position);die;
	$smarty->assign('page_title',       $position['title']);       // 页面标题
	$smarty->assign('ur_here',          $position['ur_here'] . '> ' . $topic['title']);     // 当前位置

}
$smarty->assign('piclimit',$upload_size_limit);
$smarty->assign('userid',intval($_SESSION['user_id']));
$smarty->display('apply.dwt');

?>