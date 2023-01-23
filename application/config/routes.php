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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Common_Controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Student routes
$route['student/signup'] = 'Student_Controller/signup';
$route['student/register'] = 'Student_Controller/register';
$route['student/take-test'] = 'Student_Controller/take_test';
$route['student/get-test-by-subject'] = 'Student_Controller/get_test_by_subject';
$route['student/submit-test'] = 'Student_Controller/submit_test';
$route['student/results'] = 'Student_Controller/results';
$route['student/filter-results'] = 'Student_Controller/filter_results';

// Common routes
$route['common/auth'] = 'Common_Controller/authentication';
$route['common/logout'] = 'Common_Controller/logout';
$route['common/dashboard'] = 'Common_Controller/landing';
$route['common/session'] = 'Common_Controller/print_session';

// Admin routes
$route['admin/add-professor'] = 'Admin_Controller/add_professor';
$route['admin/register-professor'] = 'Admin_Controller/register_professor';
$route['admin/viewprofessors'] = 'Admin_Controller/view_professors';
$route['admin/delete-professor/(:num)'] = 'Admin_Controller/delete_profesor/$1';
$route['admin/filter-professors-by-subject'] = 'Admin_Controller/filter_professor_by_subject';
$route['admin/student-reports'] = 'Admin_Controller/student_reports';
$route['admin/student-complete-report/(:num)'] = 'Admin_Controller/student_complete_profile/$1';

// Professor routes
$route['professor/add-questions'] = 'Professor_Controller/add_questions';
$route['professor/save-question'] = 'Professor_Controller/save_question';
$route['professor/viewquestions'] = 'Professor_Controller/viewquestions';
$route['professor/delete-question/(:num)'] = 'Professor_Controller/delete_question/$1';
$route['professor/student-reports'] = 'Professor_Controller/student_reports';
