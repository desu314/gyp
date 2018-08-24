<?php

/**
 * YNDTH Management Center pre-sale commodity language file
 * ========================================================== =============================
 * * Copyright 2008-2015 Qinhuangdao Shangzhiyi Network Technology Co., Ltd., and all rights reserved.
 * Website address: http://www.68ecshop.com;
 * ------------------------------------------------- ---------------------------
 * This is not a free software! You may only modify the program code without commercial use and
 * Use; no re-release of the program code for any purpose or for any purpose.
 * ========================================================== =============================
 * $Author: derek $
 * $Id: group_buy.php 17217 2011-01-19 06:29:08Z derek $
 */

/* Current page title and available link name*/
$_LANG['pre_sale_list'] = 'Pre-sale activity list';
$_LANG['add_pre_sale'] = 'Add pre-sale activity';
$_LANG['edit_pre_sale'] = 'Edit Pre-sales Activity';

/* Activity List Page*/
$_LANG['goods_name'] = 'Product Name';
$_LANG['start_date'] = 'Start time';
$_LANG['end_date'] = 'End time';
$_LANG['deposit'] = 'Margin';
$_LANG['restrict_amount'] = 'Restricted purchase';
$_LANG['gift_integral'] = 'Give points';
$_LANG['valid_order'] = 'Order';
$_LANG['valid_goods'] = 'Order goods';
$_LANG['current_price'] = 'current price';
$_LANG['current_status'] = 'Status';
$_LANG['view_order'] = 'View Order';

/* Add/Edit Event Page*/
$_LANG['goods_cat'] = 'Product Classification';
$_LANG['all_cat'] = 'All Categories';
$_LANG['goods_brand'] = 'Commodity Brand';
$_LANG['all_brand'] = 'All Brands';

$_LANG['label_goods_name'] = 'Pre-sale: ';
$_LANG['notice_goods_name'] = 'Please search for items first, generate a list of options here...';
$_LANG['label_start_date'] = 'Activity start time:';
$_LANG['label_end_date'] = 'Event end time:';
$_LANG['notice_datetime'] = '(year, month, day-hour)';
$_LANG['label_sale_price'] = 'Pre-sale price:';
$_LANG['label_deposit'] = 'Deposit:';
$_LANG['notice_deposit']= 'When the deposit is 0, it means that the user directly pays the current pre-sale price without paying the final payment. At this time, the payment time of the last payment cannot be set. After the pre-sale activity ends, The difference that the user has paid will be refunded based on the latest pre-sale price. ';
$_LANG['label_restrict_amount'] = 'Pre-sale stock:';
$_LANG['notice_restrict_amount']= 'To reach this amount, the pre-sales event ends automatically. 0 means there is no limit. ';
$_LANG['label_gift_integral'] = 'Give points:';
$_LANG['label_retainage_start'] = 'End payment start time:';
$_LANG['label_retainage_end'] = 'End payment end time: ';
$_LANG['notice_retainage_start'] = 'The payment of the last payment must not be earlier than the end time of the pre-sale event';
$_LANG['notice_retainage_end'] = 'It is recommended to leave the user with a minimum payment of at least 72 hours';
$_LANG['label_deliver_goods'] = 'Start delivery time description: ';
$_LANG['notice_deliver_goods'] = 'Format suggestion: 1. Expect yyyy-MM-dd HH to ship before. 2. Shipped within N days after payment. ';
$_LANG['label_price_ladder'] = 'Price ladder:';
$_LANG['notice_ladder_amount'] = 'The number of scheduled people reached';
$_LANG['notice_ladder_price'] = 'Price';
$_LANG['label_desc'] = 'Event Description:';
$_LANG['label_status'] = 'Active current status:';
$_LANG['pss'][PSS_PRE_START] = 'Not Started';
$_LANG['pss'][PSS_UNDER_WAY] = 'Pre-sale';
$_LANG['pss'][PSS_FINISHED] = 'End unprocessed';
$_LANG['pss'][PSS_SUCCEED] = 'Successful End';
$_LANG['pss'][PSS_FAIL] = 'End of failure';
$_LANG['label_order_qty'] = 'Number of Orders / Number of Effective Orders:';
$_LANG['label_goods_qty'] = 'Number of items / Number of active items:';
$_LANG['label_cur_price'] = 'Current price:';
$_LANG['label_end_price'] = 'Final price:';
$_LANG['label_handler'] = 'Operation:';
$_LANG['error_group_buy'] = 'The pre-sales activity you want to operate does not exist';
$_LANG['error_status'] = 'The current state cannot perform this operation! ';
$_LANG['button_finish'] = 'End Event';
$_LANG['notice_finish'] = '(Modify event end time is current time)';
$_LANG['button_succeed'] = 'Activity Successful';
$_LANG['notice_succeed'] = '(Update Order Price)';
$_LANG['button_fail'] = 'Activity failed';
$_LANG['notice_fail'] = '(Cancel the order, the margin will be returned to the account balance, the reason for the failure can be written in the event description)';
$_LANG['cancel_order_reason'] = 'Presale failed';
$_LANG['pre_sale_order_refund'] = 'Pre-sale success, recalculate the order amount, return the user\'s extra money';
$_LANG['js_languages']['succeed_confirm'] = 'This operation is irreversible. Are you sure you want to set this presale activity successfully? ';
$_LANG['js_languages']['fail_confirm'] = 'This operation is irreversible. Are you sure you want to set this presale activity to fail? ';
$_LANG['button_mail'] = 'Send Mail';
$_LANG['notice_mail'] = '(Notify the customer to pay the balance for delivery)';
$_LANG['mail_result'] = 'The pre-sales event has a total of %s valid orders and successfully sent %s messages. ';
$_LANG['invalid_time'] = 'You have entered an invalid pre-sale time. ';

$_LANG['add_success'] = 'Add pre-sales activity successfully. ';
$_LANG['edit_success'] = 'Edit pre-sale activity is successful. ';
$_LANG['back_list'] = 'Return the list of pre-sale events. ';
$_LANG['continue_add'] = 'Continue to add pre-sales activities. ';

/* Add/Edit Activity Submission*/
$_LANG['error_goods_null'] = 'You have not selected a pre-sale item! ';
$_LANG['error_goods_exist'] = 'The item you selected currently has a pre-sale activity in progress! ';
$_LANG['error_price_ladder'] = 'You have not entered a valid price ladder! ';
$_LANG['error_restrict_amount'] = 'The number of purchases cannot be less than the maximum number in the price ladder';
$_LANG['error_deposit'] = 'The deposit cannot be greater than the ladder price';

$_LANG['js_languages']['error_goods_null'] = 'You have not selected a pre-sale item! ';
$_LANG['js_languages']['error_deposit'] = 'The margin you entered is not a number! ';
$_LANG['js_languages']['error_restrict_amount'] = 'The number of purchases you entered is not an integer! ';
$_LANG['js_languages']['error_gift_integral'] = 'The number of bonus points you entered is not an integer! ';
$_LANG['js_languages']['search_is_null'] = 'No items found, please search again';

/* Delete pre-sales activities*/
$_LANG['js_languages']['batch_drop_confirm'] = 'Are you sure you want to delete the selected pre-sales event? ';
$_LANG['error_exist_order'] = 'The pre-sale event already has an order and cannot be deleted! ';
$_LANG['batch_drop_success'] = 'Successfully deleted %s pre-sale activity records (pre-sales for existing orders cannot be deleted). ';
$_LANG['no_select_group_buy'] = 'You don\'t have a pre-sale activity record now! ';

/* Operation log*/
$_LANG['log_action']['pre_sale'] = 'Pre-sales';

?>