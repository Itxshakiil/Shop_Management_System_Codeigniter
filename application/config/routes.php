<?php
defined('BASEPATH') or exit('No direct script access allowed');

// $route['admin'] = 'Admin/index';
// $route['admin/user'] = 'Admin/user';
// $route['product/(:any)'] = 'Product/view/$1';
// $route['buy/(:any)'] = 'Product/view/$1';
$route['register'] = 'Welcome/register';
$route['logout'] = 'Welcome/logout';
$route['login'] = 'Welcome/login';
$route['signup']['post'] = 'Welcome/signup';
$route['signin']['post'] = 'Welcome/signin';
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
