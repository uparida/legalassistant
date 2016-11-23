<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['client/questionnaire']='main/view_client_questionnaire';
// $route['client/questionnaire2/(:any)']='main/view_client_questionnaire2/$1';

$route['client/questionnaire2']='main/view_client_questionnaire2';
$route['lawyer/login']='main/view_lawyer_login';
$route['client/login']='main/view_client_login';
$route['lawyer/register']='main/view_register_lawyer';
$route['register']='home/lawyer_register';
$route['login']='home/lawyer_login';
$route['login-client']='home/client_login';
$route['dashboard']='dashboard_controller/index';
$route['dashboard-welcome']='dashboard_controller/view_welcome';
$route['dashboard-content']='dashboard_controller/view_content';
$route['dashboard-cases']='dashboard_controller/view_cases';
$route['dashboard-cases-edit']='dashboard_controller/view_cases_edit';
$route['dashboard-cases-view']='dashboard_controller/view_cases_view';
$route['dashboard-search']='dashboard_controller/view_search';
$route['dashboard-account-edit']='dashboard_controller/view_account_edit';
$route['dashboard-profile']='dashboard_controller/view_profile';
$route['dashboard-profile-edit']='dashboard_controller/view_profile_edit';

$route['logout']='dashboard_controller/logout';
$route['client-logout']='dashboard_client_controller/logout';

$route['dashboard-cases-search/(:num)']='dashboard_controller/search/$1';

$route['dashboard-client']='dashboard_client_controller/index';
$route['dashboard-client-cases']='dashboard_client_controller/view_cases';
$route['dashboard-client-profile']='dashboard_client_controller/view_profile';

$route['dashboard-client-account-edit']='dashboard_client_controller/view_account_edit';
$route['dashboard-client-content']='dashboard_client_controller/view_content';

$route['categories']='home/get_categories';
$route['lawyer/category/edit']='home/lawyer_category_edit';
$route['lawyer/category/get']='home/get_category_lawyer';
$route['lawyer/profile']='home/get_lawyer_profile';
$route['lawyer/profile/edit']='home/lawyer_profile_edit';
$route['cases']='home/get_cases';
$route['client/cases']='home/get_client_cases';
$route['client/profile']='home/get_client_profile';
$route['cases/search']='home/get_cases_search';
$route['cases/get']='home/get_case';
$route['cases/edit']='home/edit_case';
$route['callback']='main/callback';
$route['dashboard/enquiry'] = 'enquiry_controller/index';
$route['lawyer/list']='home/lawyer_list';
$route['lawyer/contact']='home/lawyer_contact';
$route['lawyerList']='main/view_lawyer_list';
$route['submitAnswers']='home/client_submit_answers';
$route['questionnaire']='home/get_questionnaire';
$route['home']='main/view_home';
$route['about-us']='main/view_abaut_us';
$route['session']='home/session';
$route['oauth']='oauth_Login/index';

$route['translate_uri_dashes'] = FALSE;
