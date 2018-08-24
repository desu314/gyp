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
 * $Author: niqingyang $
 * $Id: account_log.php 17217 2011-01-19 06:29:08Z niqingyang $
 */

/* Add page*/
$_LANG['label_chat_server_ip'] = 'Chat server IP address:';
$_LANG['label_chat_server_port'] = 'Chat server port number:';
$_LANG['label_chat_http_bind_port'] = 'HTTP-BIND port number:';
$_LANG['label_chat_server_admin_username'] = 'Chat server administrator login account:';
$_LANG['label_chat_server_admin_password'] = 'Chat server administrator login password:';
$_LANG['label_chat_server_admin_repassword'] = 'Confirm password:';
$_LANG['notice_cus_type'] = 'Customer service means that the pre-sales also represents the after-sales service. It contains the permissions of both. The user can contact the customer service from the product page or the order page at the front desk, and the pre-sales only for the non-order page. , after sale only for the order page ';
$_LANG['label_cus_enable'] = 'Available:';
$_LANG['label_add_time'] = 'Create time:';
$_LANG['label_cus_desc'] = 'Remarks:';
$_LANG['label_cus_password'] = 'Password:';
$_LANG['notice_cus_password'] = 'This password is used by the customer service personnel to log in to the desktop version of the chat client';
$_LANG['label_cus_repassword'] = 'Confirm password:';
$_LANG['label_chat_server_timout'] = 'The expiration time of the session after the user stops chatting';
$_LANG['visit_openfire'] = 'Access chat service system';



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

/* Success Information*/
$_LANG['add_success'] = 'Add customer service information successfully';
$_LANG['edit_success'] = 'Edit customer service information success';


?>