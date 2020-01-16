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
$route['default_controller'] = 'MainController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route["index"] =  'MainController/index'; 
$route["signup"] = 'MainController/RegistrationForm'; 
$route["faqs"] = 'Pages/faqs_page'; 
$route["resources"] = 'Pages/resources_page'; 
$route["contact"] = 'Pages/contact_us'; 
$route["forget-password"] = 'MainController/forget_password_form';

// Footer Meny
$route["subjects"] = 'MainController/browse_all_subjects'; 
$route["locations"] = 'MainController/browse_locations'; 

$route['search-by-subject/(:num)'] = 'Tutor_Controller/browse_tutors/$1';
$route['search-by-location/(:num)'] = 'Tutor_Controller/by_location/$1';

// tutor profile
$route['tutor/profile/(:num)'] = 'Tutor_Controller/Tutor_Profile/$1';
$route['tutor/search-result'] = 'Tutor_Controller/tutor_search_result';
$route['tutor-signup']         = 'Tutor_Controller/Tutor_Create_Profile';
$route['tutor-panel']          = 'Tutor_Controller/Tutor_Panel';
$route['tutor-logout']          = 'Tutor_Controller/Tutor_Logout';
$route['tutor-edit-profile']          = 'Tutor_Controller/Tutor_Edit_Profile_Form';
$route['tutor-subjects']              = 'Tutor_Controller/Tutor_Add_Subjects_Form';
$route['tutor-qualification']         = 'Tutor_Controller/Tutor_Add_Qualification_Form';
$route['tutor-experience']         = 'Tutor_Controller/Tutor_Add_Experience_Form';
$route['tutor-reference']         = 'Tutor_Controller/Tutor_Add_Reference_Form';
$route['tutor/edit-rate/(:num)']  = 'Tutor_Controller/change_sub_rate/$1';
$route['tutor/edit-qual/(:num)']  = 'Tutor_Controller/tutor_edit_qual_form/$1';
$route['tutor/edit-exp/(:num)']  = 'Tutor_Controller/tutor_edit_experience_form/$1';
$route['tutor/edit-ref/(:num)']  = 'Tutor_Controller/tutor_edit_reference_form/$1';
$route['tutor/del-subject/(:num)']  = 'Tutor_Controller/Tutor_delete_subject/$1';
$route['tutor/del-qual/(:num)']  = 'Tutor_Controller/Tutor_delete_Qualification/$1';
$route['tutor/del-exp/(:num)']  = 'Tutor_Controller/Tutor_delete_Experience/$1';
$route['tutor/del-ref/(:num)']  = 'Tutor_Controller/Tutor_delete_Reference/$1';


// student profile and search
$route['student/profile/(:num)'] = 'Student_Controller/view_student_profile/$1';
$route['student/search-result'] = 'Student_Controller/student_search_result';
$route['student-panel'] = 'Student_Controller/Student_Panel';
$route['student-signup'] = 'Student_Controller/Student_Create_Profile';
$route['student-logout'] = 'Student_Controller/Student_Logout';
$route['login-form'] = 'MainController/LoginForm';
$route['student-edit-profile'] = 'Student_Controller/Student_Edit_Profile_Form';
$route['student/del-subject/(:num)'] = 'Student_Controller/Student_delete_subject/$1';
$route['student-add-subject'] = 'Student_Controller/Student_Add_Subjects_Form';
$route['view-msg-details'] = 'Student_Controller/view_sent_message_details_by_student';
$route['view-msg-detail'] = 'Student_Controller/view_message_details_by_student';

// Others

$route['advert/details/(:num)'] = 'MainController/advert_details/$1';
