<?php

/**
 * YNDTH online chat customer service language file
 * ========================================================== =============================
 * * Copyright 2008-2015 Qinhuangdao Shangzhiyi Network Technology Co., Ltd., and all rights reserved.
 * Website address: http://www.68ecshop.com;
 * ------------------------------------------------- ---------------------------
 * This is not a free software! You may only modify the program code without commercial use and
 * Use; no re-release of the program code for any purpose or for any purpose.
 * ========================================================== =============================
 * $Author: Ni Qingyang $
 * $Id: account_log.php 17217 2011-01-19 06:29:08Z Ni Qingyang $
 */

/* List*/
$_LANG['add_customer'] = 'Add Customer Service';
$_LANG['customer_list'] = 'Customer List';
$_LANG['cus_id'] = 'Number';
$_LANG['user_id'] = 'Platform System User Number';
$_LANG['of_username'] = 'Chat system username';
$_LANG['cus_name'] = 'Customer Name';
$_LANG['cus_type'] = 'Customer Type';
$_LANG['cus_enable'] = 'Available';
$_LANG['add_time'] = 'Create time';

/* Add page*/
$_LANG['notice_user_name'] = 'Please select the bound administrator...';

$_LANG['label_user_id'] = 'Administrator:';
$_LANG['label_of_username'] = 'Chat system username:';
$_LANG['notice_of_username'] = 'Username when the customer logs in to the chat client';
$_LANG['label_cus_name'] = 'Customer Name:';
$_LANG['notice_cus_name'] = 'Name displayed by customer service when chatting online with users';
$_LANG['label_cus_type'] = 'Customer Type:';
$_LANG['notice_cus_type'] = 'Customer service means that the pre-sales also represents the after-sales, including the rights of both. The user can contact the customer service from the product page or the order page at the front desk, and the pre-sales only for the non-order page. After-sales only for the order page';
$_LANG['label_cus_enable'] = 'Available:';
$_LANG['label_add_time'] = 'Create time:';
$_LANG['label_cus_desc'] = 'Remarks:';
$_LANG['label_cus_password'] = 'Password:';
$_LANG['notice_cus_password'] = 'This password is used by the customer service personnel to log in to the desktop version of the chat client';
$_LANG['label_cus_repassword'] = 'Confirm password:';



/* Customer Service Type*/
$_LANG['CUS_TYPE'][0] = 'Customer Service';
$_LANG['CUS_TYPE'][1] = 'Pre-sale';
$_LANG['CUS_TYPE'][2] = 'After sale';
$_LANG['CUS_ENABLE'][0] = 'Disabled';
$_LANG['CUS_ENABLE'][1] = 'Available';

/* Error message*/
$_LANG['error_user_id_exist'] = 'The administrator has bound the customer service information';
$_LANG['error_user_id_null'] = 'Administrator number cannot be empty';
$_LANG['error_of_username_exist'] = 'The chat system username already exists';
$_LANG['error_of_username_binding'] = 'The chat system username is already bound to another administrator';
$_LANG['error_create_of_user'] = 'Create chat system user failed';
$_LANG['error_password_empty'] = 'The chat system user password cannot be empty';
$_LANG['error_of_username_empty'] = 'The chat system username cannot be empty';
$_LANG['error_cus_name_empty'] = 'Customer name cannot be empty';
$_LANG['error_php_ext_curl_invalid'] = 'Please check if the PHP extension php_curl is enabled. If this extension is not enabled then you will not be able to use instant messaging service';
$_LANG['remove_success'] = 'Delete customer service information successfully';
$_LANG['remove_fail'] = 'Delete customer service information failed';
$_LANG['error_of_username_not_admin'] = 'The chat system username cannot be admin';

/* Success Information*/
$_LANG['add_success'] = 'Add customer service information successfully';
$_LANG['edit_success'] = 'Edit customer service information success';

$_LANG['back_list'] = 'Return to the customer service list';
$_LANG['continue_add'] = 'Continue to add customer service information';
$_LANG['batch_drop_confirm'] = 'Are you sure you want to delete the selected customer service information in bulk? ';




?>