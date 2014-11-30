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



// List Managment ---------------------------------------------------------
$route['listmng/index'] = 'listmng/index';
$route['liveListSearch'] = 'listmng/liveSearch';
$route['liveGetAllOrder'] = 'listmng/liveGetAllOrder';
$route['listmng/remove/(:num)'] = 'listmng/remove/$1';
$route['listmng/removeDupes'] = 'listmng/removeDupes';

// ------------------------------------------------------------------------

// Login ------------------------------------------------------------------
$route['login'] = 'login/displayform';
$route['processLogin'] = 'login/processLogin';
$route['logout'] = 'login/logout';
// ------------------------------------------------------------------------

// File Upload ------------------------------------------------------------
$route['uploadfile'] = 'upload/index';
$route['procConfirm'] = 'upload/procConfirm';
$route['ajaxInsert'] = 'upload/ajaxInsert';
// ------------------------------------------------------------------------

// File Download ----------------------------------------------------------
$route['downloads/full'] = 'downloads/index';
$route['downloads/processDownload'] = 'downloads/processDownloads';
// ------------------------------------------------------------------------

// GROUPS -----------------------------------------------------------------
$route['group/create'] = 'group/create';
$route['group/display/(:num)'] = 'group/display/$1';
// ------------------------------------------------------------------------

// SEARCH -----------------------------------------------------------------
$route['/search/index/(:any)'] = 'search/index/$1';
// ------------------------------------------------------------------------

// SENDING STUFF ----------------------------------------------------------
$route['email/send'] = 'email/send';
// ------------------------------------------------------------------------

// CONFIG STUFF -----------------------------------------------------------
$route['config'] = 'config/index';
$route['config/editConfig'] = 'config/editConfig';
$route["config/editConfigProc"] = 'config/editConfigProc';
// ------------------------------------------------------------------------

// AUTOSAVE STUFF ---------------------------------------------------------
$route['drafts/ajaxSave'] = 'drafts/ajaxSave';
//-------------------------------------------------------------------------

// Codeigniter Defaults ---------------------------------------------------
$route[''] = 'main/index';
$route['/'] = 'main/index';
$route['default_controller'] = "main/index";



$route['404_override'] = '';
// ------------------------------------------------------------------------





/* End of file routes.php */
/* Location: ./application/config/routes.php */