<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome/users';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['users']                                 = 'welcome/users';
$route['profile/(:num)']                        = 'welcome/profile/$1';
$route['events']                                = 'welcome/events';
$route['addevent']                              = 'welcome/addevent';
$route['history']                               = 'welcome/history';
$route['reports']                               = 'welcome/reports';
$route['notifications']                         = 'welcome/notifications';
$route['profile/editprofile/(:num)']            = 'welcome/editprofile/$1  ';
$route['delete_user/(:num)']                    = 'welcome/delete_user/$1  ';
$route['eventview/(:num)']                      = 'welcome/eventview/$1';
$route['delete_report/(:num)']                  = 'welcome/delete_report/$1';
$route['delete_event/(:num)']                   = 'welcome/delete_event/$1';
$route['delete_package/(:num)']                 = 'welcome/delete_package/$1';
$route['add_offense/(:num)']                    = 'welcome/offense_count/$1';
$route['services']                              = 'welcome/services';
$route['block_page']                            = 'welcome/block_page';
$route['logout']                                = 'welcome/logout';
$route['ban/(:num)']                            = 'welcome/ban/$1';
$route['a_chat']                                = 'admin/chat';
$route['a_chat/(:num)']                         = 'admin/chat_message/$1';
$route['a_chat_send_search_message/(:num)']     = 'admin/send_search_message/$1';
$route['a_chat_compose/(:num)']                 = 'admin/chat_compose/$1'; 


//
$route['profile']                       = 'clients/profile';
$route['profile_password_edit_page']    = 'clients/profile_password_edit_page';
$route['profile_password_update']       = 'clients/profile_password_update';
$route['profile_info']                  = 'clients/profile_info';
$route['profile_edit']                  = 'clients/profile_edit_page';
$route['profile_edit_info']             = 'clients/profile_edit_info';
$route['history_client']                = 'clients/history';
$route['booking']                       = 'clients/booking';
$route['booking_book_event/(:num)']     = 'clients/booking_book_event/$1';
$route['booking_attempt/(:num)']        = 'clients/booking_attempt/$1';
$route['c_events']                      = 'clients/events';
$route['events/(:num)']                 = 'clients/event_info/$1';
$route['print_event/(:num)']            = 'clients/print_pdf/$1';
$route['calendar']                      = 'clients/calendar';
$route['package']                       = 'clients/package';
$route['register']                      = 'clients/register';
$route['register_attempt']              = 'clients/register_user';
$route['login']                         = 'clients/login';
$route['login_attempt']                 = 'clients/login_attempt';
$route['logout_user']                   = 'clients/logout';

$route['c_chat']                        = 'clients/chat';
$route['c_chat/(:num)']                 = 'clients/chat_message/$1';
$route['c_chat_send_search_message/(:num)']    = 'clients/send_search_message/$1';
$route['c_chat_compose/(:num)']         = 'clients/chat_compose/$1'; 

// 
$route['p_register']                    = 'performers/register';
$route['p_register_attempt']            = 'performers/register_attempt';
$route['p_profile']                     = 'performers/profile';
$route['p_notifications']               = 'performers/notifications';
$route['p_bookings']                    = 'performers/bookings';
$route['p_pricing']                     = 'performers/pricing';
$route['p_pricing_validate']            = 'performers/pricing_validate';
$route['p_package']                     = 'performers/package';
$route['p_package_edit_page/(:num)']    = 'performers/package_edit_page/$1'; 
$route['p_package_delete/(:num)']       = 'performers/p_package_delete/$1';
$route['p_package_update']              = 'performers/package_update';
$route['p_chat']                        = 'performers/chat';
$route['p_chat/(:num)']                 = 'performers/chat_message/$1';
$route['p_chat_send_search_message/(:num)']    = 'performers/send_search_message/$1';
$route['p_chat_compose/(:num)']         = 'performers/chat_compose/$1'; 


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