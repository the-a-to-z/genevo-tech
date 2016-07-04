<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "pages"; 
$route['404_override'] = 'welcome/error404';

$route['about-us'] = 'pages/about';
$route['privacy-policy'] = 'pages/privacy';
$route['FAQ'] = 'pages/FAQ';
$route['FAQ-job-seeker'] = 'pages/FAQ_Job_Seeker';
$route['FAQ-employer'] = 'pages/FAQ_Employer';
$route['contact-us'] = 'contact/index';

$route['information/:any'] = 'pages/information';
/* End of file routes.php */
/* Location: ./application/config/routes.php */


/*
 * 
 * Custom route url for controller job seekers
 * 
 */
 
/*$route['manage-company-profile'] = 'manage_company_profile';
$route['manage-company-profile/:any'] = 'manage_company_profile/customize_function';
* 
 /


/*
 * 
 * Custom route url for controller job seekers
 * 
 */
 /*
$route['job-seekers'] = 'job_seekers';
$route['job-seekers/:any'] = 'job_seekers/customize_function';
 */
  


/*
 * 
 * Custom route url for controller Employer
 * 
 */
 /*
$route['employers'] = 'employers';
$route['employers/:any'] = 'employers/customize_function';
*/
/*
 * 
 * Custom route url for all controller
 * Developer must put any custom routing of url by follow with putting sub array in an existing array with relational array format
 * ex: 'manage_users' => array('user_register','user_activation','user_login')
 */ 



