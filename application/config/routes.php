<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['index'] = 'welcome/index';
$route['users'] = 'welcome/users';
$route['profile/(:num)'] = 'welcome/profile/$1';
$route['events'] = 'welcome/events';
$route['addevent'] = 'welcome/addevent';
$route['services'] = 'welcome/services';
$route['history'] = 'welcome/history';
$route['histview/(:num)'] = 'welcome/histview/$1';
$route['reports'] = 'welcome/reports';
$route['notifications'] = 'welcome/notifications';
$route['messages'] = 'welcome/messages';
$route['profile/editprofile/(:num)'] = 'welcome/editprofile/$1  ';
$route['delete_user/(:num)'] = 'welcome/delete_user/$1  ';
$route['eventview/(:num)'] = 'welcome/eventview/$1';
$route['delete_history/(:num)'] = 'welcome/delete_history/$1';
$route['delete_report/(:num)'] = 'welcome/delete_report/$1';
$route['delete_event/(:num)'] = 'welcome/delete_event/$1';
$route['delete_package/(:num)'] = 'welcome/delete_package/$1';
$route['services'] = 'welcome/services';
$route['logout'] = 'welcome/logout';

// 
$route['profile'] = 'clients/profile';
$route['profile_password_edit_page'] = 'clients/profile_password_edit_page';
$route['profile_info'] = 'clients/profile_info';
$route['profile_edit'] = 'clients/profile_edit_page';
$route['profile_edit_info'] = 'clients/profile_edit_info';
$route['client_history'] = 'clients/history';
$route['booking'] = 'clients/booking';
$route['calendar'] = 'clients/calendar';
$route['package'] = 'clients/package';
$route['register'] = 'clients/register';
$route['register_attempt'] = 'clients/register_user';
$route['login'] = 'clients/login';
$route['login_attempt'] = 'clients/login_attempt';
$route['client_logout'] = 'clients/logout';

$route['chat'] = 'clients/chat';
$route['chat_new'] = 'clients/chat_new';

// 
$route['p_register'] = 'performers/register';
$route['p_register_attempt'] = 'performers/register_attempt';


/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/