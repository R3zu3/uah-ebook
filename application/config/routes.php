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
$route['default_controller'] 		= 'Cprincipal';
$route['404_override'] 				= '';
$route['translate_uri_dashes'] 		= FALSE;

////////////////////////////////////////////////////////////////

$route['login'] 					= 'Cprincipal/login';
$route['login_adm'] 				= 'Cprincipal/login_adm';
$route['biblioteca'] 				= 'Cprincipal/biblioteca';
$route['cargar_libro_user'] 		= 'Cprincipal/cargar_libro_user';
$route['datos_user'] 				= 'Cprincipal/datos_user';

////////////////////////////////////////////////////////////////

$route['materias'] 					= 'Cprincipal/materias';
$route['materiasfull'] 				= 'Cprincipal/materias_full';

$route['libros_materias'] 			= 'Cprincipal/libros_materias';
$route['libros_semestres'] 			= 'Cprincipal/libros_semestres';

$route['libros_total'] 				= 'Cprincipal/libros_total';
$route['tdg_total'] 				= 'Cprincipal/tdg_total';

$route['iniciar_ses_user'] 			= 'Cprincipal/iniciar_ses_user';
$route['iniciar_ses_adm'] 			= 'Cprincipal/iniciar_ses_adm';

$route['cerrar_ses_user'] 			= 'Cprincipal/cerrar_ses_user';
$route['cerrar_ses_adm'] 			= 'Cprincipal/cerrar_ses_adm';

$route['subir_libro'] 				= 'Cprincipal/subir_libro';

$route['actualizar_libro'] 			= 'Cprincipal/actualizar_libro';

$route['actualizar_tdg'] 			= 'Cprincipal/actualizar_tdg';

$route['actualizar_pass'] 			= 'Cprincipal/actualizar_pass';

$route['subir_tdg'] 				= 'Cprincipal/subir_tdg';

////////////////////////////////////////////////////////////////

$route['dashboard'] = 'Cprincipal/dashboard';

$route['cargar_libro_adm'] = 'Cprincipal/cargar_libro_adm';

$route['cargar_tdg_adm'] = 'Cprincipal/cargar_tdg_adm';

$route['editar_libro'] = 'Cprincipal/editar_libro';

$route['editar_tdg'] = 'Cprincipal/editar_tdg';

$route['ver_libros'] = 'Cprincipal/ver_libros';

$route['ver_tdg'] = 'Cprincipal/ver_tdg';

////////////////////////////////////////////////////////////////

$route['del_libro'] = 'Cprincipal/del_libro';

$route['del_tdg'] = 'Cprincipal/del_tdg';

$route['aprobar_libro'] = 'Cprincipal/aprobar_libro';

$route['rechazar_libro'] = 'Cprincipal/rechazar_libro';

$route['editar_libro'] = 'Cprincipal/editar_libro';

////////////////////////////////////////////////////////////////

$route['ver'] = 'Cprincipal/ver';

$route['opentdg'] = 'Cprincipal/opentdg';