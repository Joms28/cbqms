<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'MainController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/login'] = 'Users/admin_user_login';

$route['admin/dashboard'] = 'Users/admin_user_index';

$route['admin/department'] = 'Users/admin_department';
$route['admin/department/create'] = 'Users/admin_department_create';

$route['admin/account'] = 'Users/admin_member';
$route['admin/account/create'] = 'Users/admin_member_create';

$route['admin/setting'] = 'Users/admin_user_profile';
$route['admin/setting/password'] = 'Users/admin_user_change_password';

$route['admin/logout'] = 'Users/logout';


$route['login'] = 'MainController/main_sign_in';
$route['signup'] = 'MainController/main_sign_up';
$route['forgot'] = 'MainController/main_forget_password';
$route['forgot/verif/(:any)'] = 'MainController/main_forget_password_verification/$1';
$route['forgot/change/(:any)'] = 'MainController/main_forget_change_password/$1';
$route['walkin'] = 'MainController/walkin';

$route['walkin-cashier'] = 'MainController/MainController_walk_in_cashier';
$route['walkin-registrar'] = 'MainController/MainController_walk_in_registrar';

$route['walkin-ticket/(:any)'] = 'MainController/MainController_walk_in_ticket/$1';

$route['visitor-dashboard'] = 'MainController/visitor_dashboard';
$route['visitor-profile'] = 'MainController/visitor_profile';
$route['visitor-registrar'] = 'MainController/visitor_form_registrar';
$route['visitor-registrar/delete/(:any)'] = 'MainController/visitor_from_registrar_delete/$1';
$route['visitor-registrar-ticket'] = 'MainController/visitor_form_registrar_ticket';
$route['visitor-cashier'] = 'MainController/visitor_form_cashier';
$route['visitor-cashier/delete/(:any)'] = 'MainController/visitor_from_cashier_delete/$1';
$route['visitor-cashier-ticket'] = 'MainController/visitor_form_cashier_ticket';
$route['visitor-logout'] = 'MainController/visitor_logout';

//recreate recreate_appointment_cashier
$route['recreate_appointment_registrar/(:any)'] = 'MainController/recreate_appointment_registrar/$1';
$route['recreate_appointment_cashier/(:any)'] = 'MainController/recreate_appointment_cashier/$1';


$route['employee-login'] = 'Employee/login';
$route['employee-logout'] = '';
$route['employee-dashboard'] = 'Employee/dashboard';
$route['employee-appointment/(:any)'] = 'Employee/appointmentProcessing/$1';
$route['employee-appointment/(:any)/complete'] = 'Employee/processComplete/$1';
$route['employee-appointment/(:any)/cancel'] = 'Employee/processCancel/$1';
$route['employee-process-appointment/(:any)'] = 'Employee/processAppointment/$1';
$route['employee-profile'] = 'Employee/profile';
$route['employee-log'] = 'Employee/log';
$route['employee-logout'] = 'Employee/logout';


$route['cms'] = 'AdminMainControllerController/index';

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


$route['tv'] = 'MainController/tv';
$route['bleep/(:any)'] = 'MainController/bleep/$1';
