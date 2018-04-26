<?php
/**
 * YNDTH 入驻商缴费
 * ============================================================================
 * $Author: yehuaixiao $
 * $Id: order.php 17219 2011-01-27 10:49:19Z yehuaixiao $
 */

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . 'languages/' . $_CFG['lang'] . '/apply_pay.php');

/*------------------------------------------------------ */
//-- 入驻商缴费
/*------------------------------------------------------ */
$act = empty($_REQUEST['act']) ? 'default' : $_REQUEST['act'];
if ($act == 'default')
{
    /* 检查权限 */
    admin_priv('default');
    $_LANG = $GLOBALS['_LANG'];
    $smarty = $GLOBALS['smarty'];
    $supplier_id = $_SESSION['supplier_id'];
    //ini_set('display_errors', 1);
    //echo '<pre>';print_r($_SESSION);die;
    $rank_account_sql = "select ra.* from " . $GLOBALS['ecs']->table('rank_account') . " as ra left join " . $GLOBALS['ecs']->table('supplier') . " as s on ra.user_id = s.user_id where s.supplier_id = ".$supplier_id . " order by paid_time desc limit 1";
    //echo $rank_account_sql;die;
    $rank_account = $GLOBALS['db']->getRow($rank_account_sql);
    $paid_time = $rank_account['paid_time'];

    if($rank_account['is_paid'] && strtotime("+1years",$paid_time) < time()){
        sys_msg($_LANG['rank_account_is_paid']);
    }
    $sql = "select r.* from " . $GLOBALS['ecs']->table('supplier_rank') . " as r left join " .$GLOBALS['ecs']->table('supplier') . " as s on s.rank_id = r.rank_id where s.supplier_id=" . $supplier_id;
    $res = $GLOBALS['db']->getRow($sql);

    $smarty->assign('rank', $res);//所选店铺等级信息

    include_once(ROOT_PATH . 'includes/lib_clips.php');
    $smarty->assign('payment', get_online_payment_list(false));//支付方式

    $smarty->assign('lang', $_LANG);
    $smarty->assign('action', 'pay_view');
    $smarty->display('apply_pay.htm');
}
elseif($act == 'rank_pay')
{
    include_once(ROOT_PATH . 'includes/lib_clips.php');
    include_once(ROOT_PATH . 'includes/lib_payment.php');
    include_once(ROOT_PATH . 'includes/lib_order.php');
    $_LANG = $GLOBALS['_LANG'];
    $smarty = $GLOBALS['smarty'];
    $db = $GLOBALS['db'];
    $ecs = $GLOBALS['ecs'];
    $user_id = $GLOBALS['db']->getOne("select user_id from " . $GLOBALS['ecs']->table('supplier') . " where supplier_id=".$_SESSION['supplier_id']);

    $smarty->assign('lang', $_LANG);
    //ini_set('display_errors',1);
    if ($_POST['payment_id'] <= 0) {
        sys_msg($_LANG['rank_select_payment_pls']);
    }

    include_once(ROOT_PATH . 'includes/lib_payment.php');
    // 获取支付方式名称
    $payment_info = array();
    $payment_info = payment_info($_POST['payment_id']);
    $rank['payment'] = $payment_info['pay_name'];
    $rank['rank_id'] = $_POST['r'];
    $rank['user_id'] = $user_id;
    $sql = "select rank_money from " . $GLOBALS['ecs']->table('supplier_rank') . " where rank_id=".$_POST['r'];
    $amount = $GLOBALS['db']->getOne($sql);
    if ($payment_info['pay_code'] == 'alipay_bank') {
        $rank['defaultbank'] = isset($_POST['www_68ecshop_com_bank']) ? trim($_POST['www_68ecshop_com_bank']) : '';
    }
    //插入入驻商缴费明细
    $rank['rec_id'] = insert_rank_account($rank, $amount);
    // 取得支付信息，生成支付代码
    $payment = unserialize_config($payment_info['pay_config']);
    /* 调用相应的支付方式文件 */
    include_once(ROOT_PATH . 'includes/modules/payment/' . $payment_info['pay_code'] . '.php');

    //echo '<pre>';print_r($_SESSION);die;
    // 生成伪订单号, 不足的时候补0
    $order = array();
    $order['order_sn'] = $rank['rec_id'];
    $order['user_name'] = $_SESSION['supplier_name'];
    $order['surplus_amount'] = $amount;
    $order['defaultbank'] = $rank['defaultbank'];
    // 计算支付手续费用
    $payment_info['pay_fee'] = pay_fee($_POST['payment_id'], $order['surplus_amount'], 0);

    // 计算此次预付款需要支付的总金额
    $order['order_amount'] = $amount + $payment_info['pay_fee'];
    // 记录支付log
    $order['log_id'] = insert_pay_log($rank['rec_id'], $order['order_amount'], $type = PAY_RANK, 0);

    /* 取得在线支付方式的支付按钮 */
    $pay_obj = new $payment_info['pay_code']();
    $payment_info['pay_button'] = $pay_obj->get_code($order, $payment);

    $smarty->assign('payment', $payment_info);
    $smarty->assign('pay_fee', price_format($payment_info['pay_fee'], false));
    $smarty->assign('amount', price_format($amount, false));
    $smarty->assign('order', $order);
    $smarty->assign('action', 'act_account_rank');
    $smarty->display('apply_pay.htm');
}

?>