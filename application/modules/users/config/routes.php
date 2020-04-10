<?php
$route['users/security-check']			=   "Users";
$route['users/security']				=   "Users/login";
$route['users/security-login'] 			=   "Users/login_data_check";
$route['users/security-logout'] 		=   "Users/logout";
$route['users/new-user'] 				=   "Users/add_user";
$route['users/new-user-data'] 			=   "Users/add_user_data_check";
$route['users/all-user'] 				=   "Users/all_users";
$route['users/edit-user/(:num)'] 		=   "Users/edit_user/$1";
$route['users/edit-user-pass/(:num)'] 	=   "Users/edit_user_pass/$1";
$route['users/edit-user-data/(:num)'] 	=   "Users/edit_user_data_check/$1";
$route['users/edit-user-pass-check/(:num)'] 	=   "Users/edit_user_pass_check/$1";
$route['users/delete-user-data/(:num)'] =   "Users/delete_user/$1";
?>