<?php

/**
 * YNDTH 退换货订单管理语言文件
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: QQ800007396 $
 * $Id: order.php 17217 2011-01-19 06:29:08Z $
 */

/* Order search */
$_LANG['order_sn'] = 'Original order number';
$_LANG['back_goods_sn'] = 'Return / repair commodity No';
$_LANG['back_goods_name'] = 'Return / repair commodity';
$_LANG['back_id'] = 'Serial number';
$_LANG['back_money_1'] = 'Refund of amount';
$_LANG['back_money_2'] = 'Retreating amount';
$_LANG['back_username'] = 'Applicant';
$_LANG['consignee'] = 'Consignee';
$_LANG['all_status'] = 'Order status';

$_LANG['back_goods_info'] = 'Return / repair - commodity information';

$_LANG['cs'][OS_UNCONFIRMED] = 'To be confirmed';
$_LANG['cs'][CS_AWAIT_PAY] = 'Pending payment';
$_LANG['cs'][CS_AWAIT_SHIP] = 'Pending delivery';
$_LANG['cs'][CS_FINISHED] = 'Completed';
$_LANG['cs'][PS_PAYING] = 'In payment';
$_LANG['cs'][OS_CANCELED] = 'cancel';
$_LANG['cs'][OS_INVALID] = 'invalid';
$_LANG['cs'][OS_RETURNED] = 'Return goods';
$_LANG['cs'][OS_SHIPPED_PART] = 'Partial shipments';

/* 订单状态 */
$_LANG['os'][OS_UNCONFIRMED] = 'Unconfirmed';
$_LANG['os'][OS_CONFIRMED] = 'Confirmed';
$_LANG['os'][OS_CANCELED] = '<font color="red">cancel</font>';
$_LANG['os'][OS_INVALID] = '<font color="red">invalid</font>';
$_LANG['os'][OS_RETURNED] = '<font color="red">Return goods</font>';
$_LANG['os'][OS_SPLITED] = 'Already divided';
$_LANG['os'][OS_SPLITING_PART] = 'Partial order';

$_LANG['ss'][SS_UNSHIPPED] = 'Unshipped delivery';
$_LANG['ss'][SS_PREPARING] = 'In the distribution of goods';
$_LANG['ss'][SS_SHIPPED] = 'Already shipped';
$_LANG['ss'][SS_RECEIVED] = 'Receipt confirmation';
$_LANG['ss'][SS_SHIPPED_PART] = 'Shipped (part of the goods)';
$_LANG['ss'][SS_SHIPPED_ING] = 'Consignment';

$_LANG['ps'][PS_UNPAYED] = 'Unpaid';
$_LANG['ps'][PS_PAYING] = 'In payment';
$_LANG['ps'][PS_PAYED] = 'Already paid';

/* 退换货订单状态 */
$_LANG['bos'][0] = "Review and pass through</br></br>Waiting for users to return to merchandise";
$_LANG['bos'][1] = "Receipt of merchandise returned by user";
$_LANG['bos'][2] = "Goods returned have been sent out";
$_LANG['bos'][3] = "Complete return / repair";
$_LANG['bos'][4] = "Refund (no need to return)";
$_LANG['bos'][5] = "Application for audit";
$_LANG['bos'][6] = "Application denied";
$_LANG['bos'][7] = "The goods are overdue and the application is cancelled automatically";
$_LANG['bos'][8] = "Users cancel the application by themselves";

/* 退换货订单退款状态 */
$_LANG['bps'][0] = "Non refunds";
$_LANG['bps'][1] = "Refunded";
$_LANG['bps'][9] = "No refund";

$_LANG['ss_admin'][SS_SHIPPED_ING] = 'Delivery (foreground status: unshipped)';
/* 订单操作 */
$_LANG['label_operable_act'] = 'Current executable operation：';
$_LANG['label_action_note'] = 'Operating notes：';
$_LANG['label_invoice_note'] = 'Delivery notes：';
$_LANG['label_invoice_no'] = 'Invoice number：';
$_LANG['label_cancel_note'] = 'Cancelling the cause：';
$_LANG['notice_cancel_note'] = '（will be recorded in the message to the customer）';
$_LANG['op_confirm'] = 'confirm';
$_LANG['op_pay'] = 'payment';
$_LANG['op_prepare'] = 'Distribution of goods';
$_LANG['op_ship'] = 'Deliver goods';
$_LANG['op_cancel'] = 'cancel';
$_LANG['op_invalid'] = 'invalid';
$_LANG['op_return'] = 'Return goods';
$_LANG['op_unpay'] = 'Set as unpaid';
$_LANG['op_unship'] = 'Unshipped delivery';
$_LANG['op_cancel_ship'] = 'Cancel the shipment';
$_LANG['op_receive'] = 'Have received the goods';
$_LANG['op_assign'] = 'assigned to';
$_LANG['op_after_service'] = 'After sale';
$_LANG['act_ok'] = 'Successful operation';
$_LANG['act_false'] = 'operation failed';
$_LANG['act_ship_num'] = 'The quantity of the single shipment can not exceed the quantity of the order';
$_LANG['act_good_vacancy'] = 'Goods are out of stock';
$_LANG['act_good_delivery'] = 'The goods have been finished';
$_LANG['notice_gb_ship'] = 'Remarks：Group buying activities are not processed before shipment';
$_LANG['back_list'] = 'Return order list';
$_LANG['op_remove'] = 'delete';
$_LANG['op_you_can'] = 'You can do the operation';
$_LANG['op_split'] = 'Generate invoice';
$_LANG['op_to_delivery'] = 'Go to delivery';

/* 订单列表 */
$_LANG['order_amount'] = 'Amount payable';
$_LANG['total_fee'] = 'Total amount';
$_LANG['shipping_name'] = 'Distribution mode';
$_LANG['pay_name'] = 'Payment method';
$_LANG['address'] = 'address';
$_LANG['order_time'] = 'Order time';
$_LANG['detail'] = 'See';
$_LANG['phone'] = 'Telephone';
$_LANG['group_buy'] = '（Group purchase）';
$_LANG['error_get_goods_info'] = 'Error in obtaining order commodity information';
$_LANG['exchange_goods'] = '（exchange）';

$_LANG['js_languages']['remove_confirm'] = 'Deleting an order will clear all information about the order. Are you sure you want to do this?';

/* 订单搜索 */
$_LANG['label_order_sn'] = 'Order number：';
$_LANG['label_all_status'] = 'Order status：';
$_LANG['label_user_name'] = 'Shopper：';
$_LANG['label_consignee'] = 'Consignee：';
$_LANG['label_email'] = 'E-mail：';
$_LANG['label_address'] = 'address：';
$_LANG['label_zipcode'] = 'Zip code：';
$_LANG['label_tel'] = 'Telephone：';
$_LANG['label_mobile'] = 'Mobile phone：';
$_LANG['label_shipping'] = 'Distribution mode：';
$_LANG['label_payment'] = 'Payment method：';
$_LANG['label_order_status'] = 'Order status：';
$_LANG['label_pay_status'] = 'State of payment：';
$_LANG['label_shipping_status'] = 'Delivery status：';
$_LANG['label_area'] = 'The area in which it is located：';
$_LANG['label_time'] = 'Order time：';

/* 订单详情 */
$_LANG['prev'] = 'Previous order';
$_LANG['next'] = 'Next order';
$_LANG['print_order'] = 'Print orders';
$_LANG['print_shipping'] = 'Print Express';
$_LANG['print_order_sn'] = 'Order number：';
$_LANG['print_buy_name'] = 'Shopper：';
$_LANG['label_consignee_address'] = 'Receiving address：';
$_LANG['no_print_shipping'] = "I'm sorry, you haven't set up the print express template yet. You can't print it.";
$_LANG['suppliers_no'] = 'No supplier is designated.';
$_LANG['restaurant'] = 'Our shop';

$_LANG['order_info'] = 'Order information';
$_LANG['base_info'] = 'Original order information';
$_LANG['back_info'] = 'Refund / return / repair information';
$_LANG['other_info'] = 'Other information';
$_LANG['consignee_info'] = 'consignee';
$_LANG['fee_info'] = 'Cost information';
$_LANG['action_info'] = 'Operation information';
$_LANG['shipping_info'] = 'Distribution information';

$_LANG['label_how_oos'] = 'Shortage handling：';
$_LANG['label_how_surplus'] = 'Balance processing：';
$_LANG['label_pack'] = 'Packing：';
$_LANG['label_card'] = 'Greeting cards：';
$_LANG['label_card_message'] = 'Greeting card blessing：';
$_LANG['label_order_time'] = 'Order time：';
$_LANG['label_pay_time'] = 'Time of payment：';
$_LANG['label_shipping_time'] = 'Delivery time：';
$_LANG['label_sign_building'] = 'Landmark building：';
$_LANG['label_best_time'] = 'Best delivery time：';
$_LANG['label_inv_type'] = 'Invoice type：';
$_LANG['label_inv_payee'] = 'Invoices are raised：';
$_LANG['label_inv_content'] = 'Invoice content：';
$_LANG['label_postscript'] = 'Message from customers to businesses：';
$_LANG['label_region'] = 'region：';

$_LANG['label_shop_url'] = 'Website：';
$_LANG['label_shop_address'] = 'address：';
$_LANG['label_service_phone'] = 'Telephone：';
$_LANG['label_print_time'] = 'Printing time：';

$_LANG['label_suppliers'] = 'Supplier selection：';
$_LANG['label_agency'] = 'Office：';
$_LANG['suppliers_name'] = 'supplier';

$_LANG['product_sn'] = 'Goods number';
$_LANG['goods_info'] = 'Original order - commodity information';
$_LANG['goods_name'] = 'Product Name';
$_LANG['goods_name_brand'] = 'Product Name [Brand]';
$_LANG['goods_sn'] = 'item number';
$_LANG['goods_price'] = 'Price';
$_LANG['goods_number'] = 'Quantity';
$_LANG['goods_attr'] = 'Properties';
$_LANG['goods_delivery'] = 'Number of Shipments';
$_LANG['goods_delivery_curr'] = 'This shipment quantity';
$_LANG['storage'] = 'Inventory';
$_LANG['subtotal'] = 'Subtotal';
$_LANG['label_total'] = 'Total:';
$_LANG['label_total_weight'] = 'Total merchandise weight:';

$_LANG['label_goods_amount'] = 'Total amount of goods:';
$_LANG['label_discount'] = 'Discount:';
$_LANG['label_tax'] = 'Invoice Tax Amount:';
$_LANG['label_shipping_fee'] = 'Distribution fee:';
$_LANG['label_insure_fee'] = 'Insured Cost:';
$_LANG['label_insure_yn'] = 'Is it insured:';
$_LANG['label_pay_fee'] = 'Payment fee:';
$_LANG['label_pack_fee'] = 'Package fee:';
$_LANG['label_card_fee'] = 'Card fee: ';
$_LANG['label_money_paid'] = 'Payment Amount:';
$_LANG['label_surplus'] = 'Use balance:';
$_LANG['label_integral'] = 'Use points:';
$_LANG['label_bonus'] = 'Use red envelope:';
$_LANG['label_order_amount'] = 'Total order amount:';
$_LANG['label_money_dues'] = 'Amount due:';
$_LANG['label_money_refund'] = 'The amount that should be refunded:';
$_LANG['label_to_buyer'] = 'Business message to customer:';
$_LANG['save_order'] = 'Save Order';
$_LANG['notice_gb_order_amount'] = '(Note: If the group buys a deposit, the first time you only need to pay the deposit and the corresponding payment)';

$_LANG[ 'action_user'] = 'operator:';
$_LANG['action_time'] = 'Operation time';
$_LANG['order_status'] = 'Order Status';
$_LANG['pay_status'] = 'Payment Status';
$_LANG['shipping_status'] = 'Delivery Status';
$_LANG['action_note'] = 'Remarks';
$_LANG['pay_note'] = 'Payment note:';

$_LANG['sms_time_format'] = 'm month j day G hour';
$_LANG['order_shipped_sms'] = 'Your order %s has been shipped at %s[%s]';
$_LANG['order_splited_sms'] = 'Your order %s, %s is in %s [%s]';
$_LANG['order_removed'] = 'The order was deleted successfully. ';
$_LANG['return_list'] = 'Return order list';

/* Order Processing Tips*/
$_LANG['surplus_not_enough'] = 'The order was paid with %s balance, now the user balance is insufficient';
$_LANG['integral_not_enough'] = 'The order was paid with %s points, now the user points are insufficient';
$_LANG['bonus_not_available'] = 'The order is paid with a red envelope, now the red envelope is not available';

/* Buyer Information*/
$_LANG['display_buyer'] = 'Show buyer information';
$_LANG['buyer_info'] = 'Buyer Information';
$_LANG['pay_points'] = 'Consumer Points';
$_LANG['rank_points'] = 'Level Points';
$_LANG['user_money'] = 'Account Balance';
$_LANG['email'] = 'Email';
$_LANG['rank_name'] = 'Membership Level';
$_LANG['bonus_count'] = 'Number of red packets';
$_LANG['zipcode'] = 'Postcode';
$_LANG['tel'] = 'Phone';
$_LANG['mobile'] = 'Alternate Phone';

/* Consolidation Order*/
$_LANG['order_sn_not_null'] = 'Please fill in the order number to be merged';
$_LANG['two_order_sn_same'] = 'The two order numbers to be merged cannot be the same';
$_LANG['order_not_exist'] = 'Order %s does not exist';
$_LANG['os_not_unconfirmed_or_confirmed'] = 'The order status of %s is not "unconfirmed" or "confirmed"';
$_LANG['ps_not_unpayed'] = 'The payment status of order %s is not "not paid"';
$_LANG['ss_not_unshipped'] = 'The delivery status of order %s is not "not shipped"';
$_LANG['order_user_not_same'] = 'The two orders to be merged are not under the same user';
$_LANG['merge_invalid_order'] = 'Sorry, the order you selected to merge does not allow the merge operation. ';

$_LANG['from_order_sn'] = 'From order:';
$_LANG['to_order_sn'] = 'Master Order:';
$_LANG['merge'] = 'Merge';
$_LANG['notice_order_sn'] = 'When the two orders are inconsistent, the combined order information (such as payment method, delivery method, packaging, greeting card, red envelope, etc.) is subject to the main order. ';
$_LANG['js_languages']['confirm_merge'] = 'Do you really want to merge these two orders? ';

/* Batch processing*/
$_LANG['pls_select_order'] = 'Please select the order you want to operate';
$_LANG['no_fulfilled_order'] = 'There is no order that meets the operating conditions. ';
$_LANG['updated_order'] = 'Updated Order:';
$_LANG['order'] = 'Order:';
$_LANG['confirm_order'] = 'The following order cannot be set to confirm status';
$_LANG['invalid_order'] = 'The following order could not be set to invalid';
$_LANG['cancel_order'] = 'The following order cannot be cancelled';
$_LANG['remove_order'] = 'The following order could not be removed';

/* Edit order print template*/
$_LANG['edit_order_templates'] = 'Edit Order Print Template';
$_LANG['template_resetore'] = 'Restore template';
$_LANG['edit_template_success'] = 'Edit Order Print Template Operation Successful!';
$_LANG['remark_fittings'] = '(Accessories)';
$_LANG['remark_gift'] = '(gifts)';
$_LANG['remark_favourable'] = '(special offer)';
$_LANG['remark_package'] = '(礼包)';

/* Order Source Statistics*/
$_LANG['from_order'] = 'Order Source:';
$_LANG['from_ad_js'] = 'Advertising:';
$_LANG['from_goods_js'] = 'JS delivery outside the merchandise station';
$_LANG['from_self_site'] = 'From this site';
$_LANG['from'] = 'From site:';

/* Add, edit order */
$_LANG['add_order'] = 'Add Order';
$_LANG['edit_order'] = 'Edit Order';
$_LANG['step']['user'] = 'Please select which member you want to place an order for';
$_LANG['step']['goods'] = 'Select Product';
$_LANG['step']['consignee'] = 'Set the consignee information';
$_LANG['step']['shipping'] = 'Select delivery method';
$_LANG['step']['payment'] = 'Select payment method';
$_LANG['step']['other'] = 'Set other information';
$_LANG['step']['money'] = 'Setting Fees';
$_LANG['anonymous'] = 'Anonymous User';
$_LANG['by_useridname'] = 'Search by member number or member name';
$_LANG['button_prev'] = 'Previous';
$_LANG['button_next'] = 'Next';
$_LANG['button_finish'] = 'Complete';
$_LANG['button_cancel'] = 'Cancel';
$_LANG['name'] = 'name';
$_LANG['desc'] = 'Description';
$_LANG['shipping_fee'] = 'Delivery Fee';
$_LANG['free_money'] = 'Free credit';
$_LANG['insure'] = 'Insurance fee';
$_LANG['pay_fee'] = 'Handling fee';
$_LANG['pack_fee'] = 'Package Fee';
$_LANG['card_fee'] = 'Greeting card fee';
$_LANG['no_pack'] = 'Do not wrap';
$_LANG['no_card'] = 'Do not want a greeting card';
$_LANG['add_to_order'] = 'Join Order';
$_LANG['calc_order_amount'] = 'Calculating order amount';
$_LANG['available_surplus'] = 'Available balance:';
$_LANG['available_integral'] = 'Available points:';
$_LANG['available_bonus'] = 'Available red envelopes:';
$_LANG['admin'] = 'Admin add';
$_LANG['search_goods'] = 'Search by item number or item name or item number';
$_LANG['category'] = 'Classification';
$_LANG['brand'] = 'Brand';
$_LANG['user_money_not_enough'] = 'Insufficient user balance';
$_LANG['pay_points_not_enough'] = 'Insufficient user credits';
$_LANG['money_paid_enough'] = 'The amount of payment has been more than the sum of the total amount of the goods and various fees, please refund first';
$_LANG['price_note'] = 'Remarks: Attributes have been included in the price of the item';
$_LANG['select_pack'] = 'Select Package';
$_LANG['select_card'] = 'Select a greeting card';
$_LANG['select_shipping'] = 'Please select the shipping method first';
$_LANG['want_insure'] = 'I want to insure';
$_LANG['update_goods'] = 'Update Item';
$_LANG['notice_user'] = "<strong>Note:</strong> The search results only show the top 20 records, if no phase is found".
"As a member, please find it more accurately. In addition, if the member is registered from the forum and has not logged in at the mall, " .
"Can't find it, you need to log in at the mall first. ";
$_LANG['amount_increase'] = 'Because you have modified the order, the total order amount has increased and you need to pay again';
$_LANG['amount_decrease'] = 'Because you have modified the order, the total order amount is reduced and a refund is required';
$_LANG['continue_shipping'] = "Because you have modified the consignee's location, the original shipping method is no longer available, please re-select the shipping method";
$_LANG['continue_payment'] = 'Because you have modified the delivery method, the original payment method is no longer available, please re-select the delivery method';
$_LANG['refund'] = 'Refund';
$_LANG['cannot_edit_order_shipped'] = 'You cannot modify a shipped order';
$_LANG['address_list'] = 'Select from the existing shipping address:';
$_LANG['order_amount_change'] = 'The total amount of the order changed from %s to %s';
$_LANG['shipping_note'] = 'Description: Because the order has been shipped, modifying the shipping method will not change the shipping and insured fees. ';
$_LANG['change_use_surplus'] = 'Edit order %s, change the amount paid using prepayment';
$_LANG['change_use_integral'] = 'Edit order %s, change the number of points paid using points';
$_LANG['return_order_surplus'] = 'The prepayment used when returning the payment order %s due to cancellation, invalidation or return operation';
$_LANG['return_order_integral'] = 'Reward for returning payment order %s due to cancellation, invalidation or return operation';
$_LANG['order_gift_integral'] = 'Order %s bonus points';
$_LANG['return_order_gift_integral'] = 'Return the order %s bonus points due to return or non-shipment operation';
$_LANG['invoice_no_mall'] = '    Multiple invoice numbers, separated by commas (","). ';

$_LANG['js_languages']['input_price'] = 'Custom price';
$_LANG['js_languages']['pls_search_user'] = 'Please search for and select a member';
$_LANG['js_languages']['confirm_drop'] = 'Are you sure you want to delete this item? ';
$_LANG['js_languages']['invalid_goods_number'] = 'The number of items is incorrect';
$_LANG['js_languages']['pls_search_goods'] = 'Please search for and select items';
$_LANG['js_languages']['pls_select_area'] = 'Please select your location';
$_LANG['js_languages']['pls_select_shipping'] = 'Please select delivery method';
$_LANG['js_languages']['pls_select_payment'] = 'Please select payment method';
$_LANG['js_languages']['pls_select_pack'] = 'Please select the package';
$_LANG['js_languages']['pls_select_card'] = 'Please select a greeting card';
$_LANG['js_languages']['pls_input_note'] = 'Please fill out the remarks! ';
$_LANG['js_languages']['pls_input_cancel'] = 'Please fill in the reason for cancellation! ';
$_LANG['js_languages']['pls_select_refund'] = 'Please select a refund method! ';
$_LANG['js_languages']['pls_select_agency'] = 'Please select an office! ';
$_LANG['js_languages']['pls_select_other_agency'] = 'This order belongs to this office now, please choose another office! ';
$_LANG['js_languages']['loading'] = 'Loading...';

/* Order operation*/
$_LANG['order_operate'] = 'Order operation:';
$_LANG['label_refund_amount'] = 'Refund amount:';
$_LANG['label_handle_refund'] = 'Refund method:';
$_LANG['label_refund_note'] = 'Refund instructions:';
$_LANG['return_user_money'] = 'Return User Balance';
$_LANG['create_user_account'] = 'Generate a refund request';
$_LANG['not_handle'] = 'Do not process, select this when misoperation';

$_LANG['order_refund'] = 'Order refund: %s';
$_LANG['order_pay'] = 'Order payment: %s';

$_LANG['send_mail_fail'] = 'Send mail failed';

$_LANG['send_message'] = 'Send/View Message';

/* Invoice operation*/
$_LANG['delivery_operate'] = 'Invoice Operation:';
$_LANG['delivery_sn_number'] = 'Invoice number: ';
$_LANG['invoice_no_sms'] = 'Please fill in the invoice number! ';

/* Invoice Search*/
$_LANG['delivery_sn'] = 'Invoice';

/* Invoice Status*/
$_LANG['delivery_status'][0] = 'shipped';
$_LANG['delivery_status'][1] = 'Return';
$_LANG['delivery_status'][2] = 'Normal';

/* Invoice label */
$_LANG['label_delivery_status'] = 'Invoice Status';
$_LANG['label_suppliers_name'] = 'Supplier';
$_LANG['label_delivery_time'] = 'Generation time';
$_LANG['label_delivery_sn'] = 'Invoice Flow Number';
$_LANG['label_add_time'] = 'Application time';
$_LANG['label_update_time'] = 'Delivery time';
$_LANG['label_send_number'] = 'Quantity';

/* Invoice reminder*/
$_LANG['tips_delivery_del'] = 'Invoice is deleted successfully! ';

/* Return Order Operation*/
$_LANG['back_operate'] = 'Return order operation:';

/* Return Order Label*/
$_LANG['return_time'] = 'Return time:';
$_LANG['label_return_time'] = 'Return time';

/* Return Order Tips*/
$_LANG['tips_back_del'] = 'The return order was deleted successfully! ';

$_LANG['goods_num_err'] = 'Insufficient inventory, please re-select! ';
?>