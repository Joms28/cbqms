<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'ElaMainController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/login'] = 'ElaUserController/admin_user_login';

$route['admin/dashboard'] = 'ElaUserController/admin_user_index';

$route['admin/department'] = 'ElaUserController/admin_department';
$route['admin/department/create'] = 'ElaUserController/admin_department_create';

$route['admin/account'] = 'ElaUserController/admin_member';
$route['admin/account/create'] = 'ElaUserController/admin_member_create';

$route['admin/setting'] = 'ElaUserController/admin_user_profile';
$route['admin/setting/password'] = 'ElaUserController/admin_user_change_password';

$route['admin/logout'] = 'ElaUserController/logout';


$route['login'] = 'ElaMainController/main_sign_in';
$route['signup'] = 'ElaMainController/main_sign_up';
$route['forgot'] = 'ElaMainController/main_forget_password';
$route['forgot/verif/(:any)'] = 'ElaMainController/main_forget_password_verification/$1';
$route['forgot/change/(:any)'] = 'ElaMainController/main_forget_change_password/$1';

$route['walkin-cashier'] = 'ElaMainController/main_walk_in_cashier';
$route['walkin-registrar'] = 'ElaMainController/main_walk_in_registrar';

$route['walkin-ticket/(:any)'] = 'ElaMainController/main_walk_in_ticket/$1';

$route['visitor-dashboard'] = 'ElaMainController/visitor_dashboard';
$route['visitor-profile'] = 'ElaMainController/visitor_profile';
$route['visitor-registrar'] = 'ElaMainController/visitor_form_registrar';
$route['visitor-registrar/delete/(:any)'] = 'ElaMainController/visitor_from_registrar_delete/$1';
$route['visitor-registrar-ticket'] = 'ElaMainController/visitor_form_registrar_ticket';
$route['visitor-cashier'] = 'ElaMainController/visitor_form_cashier';
$route['visitor-cashier/delete/(:any)'] = 'ElaMainController/visitor_from_cashier_delete/$1';
$route['visitor-cashier-ticket'] = 'ElaMainController/visitor_form_cashier_ticket';
$route['visitor-logout'] = 'ElaMainController/visitor_logout';

$route['employee-login'] = 'ElaEmployeeController/login';
$route['employee-logout'] = '';
$route['employee-dashboard'] = 'ElaEmployeeController/dashboard';
$route['employee-appointment/(:any)'] = 'ElaEmployeeController/appointmentProcessing/$1';
$route['employee-appointment/(:any)/complete'] = 'ElaEmployeeController/processComplete/$1';
$route['employee-appointment/(:any)/cancel'] = 'ElaEmployeeController/processCancel/$1';
$route['employee-process-appointment/(:any)'] = 'ElaEmployeeController/processAppointment/$1';
$route['employee-profile'] = 'ElaEmployeeController/profile';
$route['employee-log'] = 'ElaEmployeeController/log';
$route['employee-logout'] = 'ElaEmployeeController/logout';


$route['cms'] = 'AdminMainController/index';

$route['cms/class'] = 'AdminClassController/index';
$route['cms/class/create'] = 'AdminClassController/create';
$route['cms/class/close/(:any)'] = 'AdminClassController/update/$1';
$route['cms/class/subject/(:any)'] = 'AdminClassController/viewClassSubject/$1';


$route['cms/subject'] = 'AdminSubjectController/index';
$route['cms/subject/create'] = 'AdminSubjectController/create';
$route['cms/subject/update/(:any)'] = 'AdminSubjectController/update/$1';
$route['cms/subject/delete/(:any)'] = 'AdminSubjectController/delete/$1';


$route['cms/user'] = 'AdminUserController/index';
$route['cms/user/student'] = 'AdminUserController/student';
$route['cms/user/create'] = 'AdminUserController/create';


$route['tv'] = 'ElaMainController/tv';
$route['bleep/(:any)'] = 'ElaMainController/bleep/$1';
