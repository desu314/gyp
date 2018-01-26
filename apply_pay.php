<?php

/**
 * YNDTH 专题前台
 * ============================================================================
 * 版权所有 2005-2011 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * @author:     webboy <laupeng@163.com>
 * @version:    v2.1
 * ---------------------------------------------
 */

define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . 'languages/' . $_CFG['lang'] . '/apply_pay.php');

if ((DEBUG_MODE & 2) != 2) {
    $smarty->caching = true;
}

$user_id = $_SESSION['user_id'];
$action = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'default';

/* 路由 */

$function_name = 'action_' . $action;

if (!function_exists($function_name)) {
    $function_name = "action_default";
}

call_user_func($function_name);

/* 路由 */

/* 未登录处理 */
if (empty($_SESSION['user_id']) && $action != 're_validate_email' && $action != 'valid_email') {
    if (!in_array($action, $not_login_arr)) {
        if (in_array($action, $ui_arr)) {
            /*
             * 如果需要登录,并是显示页面的操作，记录当前操作，用于登录后跳转到相应操作
             * if ($action == 'login')
             * {
             * if (isset($_REQUEST['back_act']))
             * {
             * $back_act = trim($_REQUEST['back_act']);
             * }
             * }
             * else
             * {}
             */
            $query_string = $_SERVER['QUERY_STRING'];
            if (!empty($query_string)) {
                if (strpos($query_string, 'findPwd.php') != false) {
                    $query_string = 'index.php';
                }
                $back_act = 'user.php?' . strip_tags($query_string);
            }
            $action = 'login';
        } else {
            // 未登录提交数据。非正常途径提交数据！
            // die($_LANG['require_login']);
            show_message($_LANG['require_login'], array(
                '</br>登录', '</br>返回首页'
            ), array(
                'user.php?act=login', $ecs->url()
            ), 'error', false);
        }
    }
}


/**
 * 默认页面 default
 */
function action_default()
{
    $_LANG = $GLOBALS['_LANG'];
    $smarty = $GLOBALS['smarty'];
    $position = assign_ur_here(0, $_LANG['apply_pay']);
    $smarty->assign('page_title', $position['title']); // 页面标题

    $rank_id = isset($_REQUEST['r']) && $_REQUEST['r'] != 0 ? $_REQUEST['r'] : 0;
    if ($rank_id == 0) {
        show_message($_LANG['rank_error'], '', 'apply.php');
    }
    $sql = "select * from " . $GLOBALS['ecs']->table('supplier_rank') . " where rank_id=" . $rank_id;
    $res = $GLOBALS['db']->getRow($sql);
    $smarty->assign('rank', $res);//所选店铺等级信息

    include_once(ROOT_PATH . 'includes/lib_clips.php');
    $smarty->assign('payment', get_online_payment_list(false));//支付方式

    $smarty->assign('rank_id', $rank_id);
    $smarty->assign('lang', $_LANG);
    $smarty->assign('action', 'pay_view');
    $smarty->display('apply_pay.dwt');
}

/**
 * 缴费操作
 */
function action_rank_pay()
{
    include_once(ROOT_PATH . 'includes/lib_clips.php');
    include_once(ROOT_PATH . 'includes/lib_payment.php');
    include_once(ROOT_PATH . 'includes/lib_order.php');
    $_LANG = $GLOBALS['_LANG'];
    $smarty = $GLOBALS['smarty'];
    $db = $GLOBALS['db'];
    $ecs = $GLOBALS['ecs'];
    $user_id = $_SESSION['user_id'];
    $smarty->assign('lang', $_LANG);
//ini_set('display_errors',1);
    $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;

    if ($_POST['payment_id'] <= 0) {
        show_message($_LANG['rank_select_payment_pls'], '', 'apply_pay.php?r=' . $_POST['r']);
    }

    include_once(ROOT_PATH . 'includes/lib_payment.php');
    // 获取支付方式名称
    $payment_info = array();
    $payment_info = payment_info($_POST['payment_id']);
    if ($payment_info['pay_code'] == 'alipay_bank') {
        $rank['defaultbank'] = isset($_POST['www_68ecshop_com_bank']) ? trim($_POST['www_68ecshop_com_bank']) : '';
    }
    //插入入驻商缴费明细
    $rank['rec_id'] = insert_rank_account($rank, $amount);
    // 取得支付信息，生成支付代码
    $payment = unserialize_config($payment_info['pay_config']);
    /* 调用相应的支付方式文件 */
    include_once(ROOT_PATH . 'includes/modules/payment/' . $payment_info['pay_code'] . '.php');

    // 生成伪订单号, 不足的时候补0
    $order = array();
    $order['order_sn'] = $rank['rec_id'];
    $order['user_name'] = $_SESSION['user_name'];
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
    $smarty->assign('action', 'act_account');
    $smarty->display('apply_pay.dwt');

}

?>