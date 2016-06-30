<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | File and Directory Modes
  |--------------------------------------------------------------------------
  |
  | These prefs are used when checking and setting modes when working
  | with the file system.  The defaults are fine on servers with proper
  | security, but you may wish (or even need) to change the values in
  | certain environments (Apache running a separate process for each
  | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
  | always be used to set the mode correctly.
  |
 */
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */
/*
 * Constant for database 
 */
define('PREFIX_DATABASE', 'cams');
define('PREFIX_TABLE', 'tbl_');
define('PREFIX_VIEW', 'vie_');
define('PREFIX_PROCEDURE', 'pro_');

/*
 * Constant template
 */
/*
 * Global backend template
 */
define('G_CSS', 'templates/global/css/');
define('G_JS', 'templates/global/js/');
define('G_IMG', 'templates/global/images/');
define('G_FONT', 'templates/global/fonts/');
define('G_IMG_BOOTSTRAP', 'templates/global/img/');

/*
 * Back-end template constant
 */
define('B_CSS', 'templates/back_end/css/');
define('B_JS', 'templates/back_end/js/');
define('B_IMG', 'templates/back_end/images/');
define('B_FONT', 'templates/back_end/fonts/');
define('B_MASTER', 'templates/back_end/master/master');
define('B_TEMPLATE', 'templates/back_end/');
define('B_INC_PAGES', 'templates/back_end/master/');
/*
 * Front-end template
 */
define('F_CSS', 'templates/front_end/css/');
define('F_JS', 'templates/front_end/js/');
define('F_IMG', 'templates/front_end/images/');
define('F_FONT', 'templates/front_end/fonts/');
define('F_MASTER', 'templates/front_end/master/master');
define('F_MASTER_CV', 'templates/front_end/master/view_cv_online');
define('F_MASTER_CV_PDF', 'templates/front_end/master/export_pdf_cv');

define('F_TEMPLATE', 'templates/front_end/');
define('F_INC_PAGES', 'templates/front_end/master/');

/*
 * Back-end constant
 */
define('USERS', 'NONE');
define('USE_USERNAME', 'NONE');
