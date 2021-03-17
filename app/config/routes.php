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

$__admin = '/backoffice';

/* ----------- ADMIN ----------- */

$route['backoffice']                                            = $__admin .'/home';
$route['backoffice/login/crear-usuario']                        = $__admin .'/login/create_user';
$route['backoffice/login/login-con-ajax']                       = $__admin .'/login/ajax_login';
$route['backoffice/login/test-login-opcional']                  = $__admin .'/login/optional_login_test';
$route['backoffice/login/verificacion-simple']                  = $__admin .'/login/simple_verification';

/* CONFIGURACIÓN ------------------------------------------------------- */

$route['backoffice/configuracion']                              = $__admin .'/home/settings';

$route['backoffice/configuracion/menus']                        = $__admin .'/home/settingMenus';
$route['backoffice/configuracion/menu/(:any)']                  = $__admin .'/home/settingMenu/$1';
$route['backoffice/configuracion/menu/(:any)/editar']           = $__admin .'/home/settingEditMenu/$1';
$route['backoffice/configuracion/menus/nuevo']                  = $__admin .'/home/settingNewMenu';
$route['backoffice/configuracion/menus/p/(:any)']               = $__admin .'/home/settingMenus/$1';

$route['backoffice/configuracion/objetos']                      = $__admin .'/home/settingObjects';
$route['backoffice/configuracion/objeto/(:any)']                = $__admin .'/home/settingObject/$1';
$route['backoffice/configuracion/objeto/(:any)/editar']         = $__admin .'/home/settingEditObject/$1';
$route['backoffice/configuracion/objetos/nuevo']                = $__admin .'/home/settingNewObject';
$route['backoffice/configuracion/objetos/p/(:any)']             = $__admin .'/home/settingObjects/$1';

$route['backoffice/configuracion/recursos']                     = $__admin .'/home/settingResources';
$route['backoffice/configuracion/recurso/(:any)']               = $__admin .'/home/settingResource/$1';
$route['backoffice/configuracion/recurso/(:any)/editar']        = $__admin .'/home/settingEditResource/$1';
$route['backoffice/configuracion/recursos/nuevo']               = $__admin .'/home/settingNewResource';
$route['backoffice/configuracion/recursos/p/(:any)']            = $__admin .'/home/settingResources/$1';

$route['backoffice/configuracion/roles']                        = $__admin .'/home/settingRoles';
$route['backoffice/configuracion/role/(:any)']                  = $__admin .'/home/settingRole/$1';
$route['backoffice/configuracion/role/(:any)/editar']           = $__admin .'/home/settingEditRole/$1';
$route['backoffice/configuracion/roles/nuevo']                  = $__admin .'/home/settingNewRole';
$route['backoffice/configuracion/roles/p/(:any)']               = $__admin .'/home/settingRoles/$1';

$route['backoffice/configuracion/usuarios']                     = $__admin .'/home/settingUsers';

/* CURSOS ------------------------------------------------------- */

$route['backoffice/cursos']                                     = $__admin .'/home/getCourses';
$route['backoffice/curso/(:any)']                               = $__admin .'/home/getCourse/$1';
$route['backoffice/curso/(:any)/editar']                        = $__admin .'/home/editCourse/$1';
$route['backoffice/cursos/nuevo']                               = $__admin .'/home/newCourse';
$route['backoffice/cursos/p/(:any)']                            = $__admin .'/home/getCourses/$1';

/* DIPLOMADOS ------------------------------------------------------- */

$route['backoffice/diplomados']                                 = $__admin .'/home/getGraduates';
$route['backoffice/diplomado/(:any)']                           = $__admin .'/home/getGraduate/$1';
$route['backoffice/diplomado/(:any)/editar']                    = $__admin .'/home/editGraduate/$1';
$route['backoffice/diplomados/nuevo']                           = $__admin .'/home/newGraduate';
$route['backoffice/diplomados/p/(:any)']                        = $__admin .'/home/getGraduates/$1';

/* HERRAMIENTAS ------------------------------------------------------- */

$route['backoffice/herramientas']                               = $__admin .'/home/getTools';
$route['backoffice/herramienta/(:any)']                         = $__admin .'/home/getTool/$1';
$route['backoffice/herramienta/(:any)/editar']                  = $__admin .'/home/editTool/$1';
$route['backoffice/herramientas/nueva']                         = $__admin .'/home/newTool';
$route['backoffice/herramientas/p/(:any)']                      = $__admin .'/home/getTools/$1';

/* LOGIN ------------------------------------------------------- */

$route['backoffice/login']                                      = $__admin .'/login';
$route['backoffice/perfil']                                     = $__admin .'/home/getProfile';

/* OBJETOS ------------------------------------------------------- */

$route['backoffice/objetos']                                    = $__admin .'/home/getObjects';
$route['backoffice/objeto/(:any)']                              = $__admin .'/home/getObject/$1';
$route['backoffice/objeto/(:any)/editar']                       = $__admin .'/home/editObject/$1';
$route['backoffice/objetos/nuevo']                              = $__admin .'/home/newObject';
$route['backoffice/objetos/p/(:any)']                           = $__admin .'/home/getObjects/$1';
$route['backoffice/objetos/subir-imagen']                       = $__admin .'/home/img_upload';
$route['backoffice/objetos/subir-objeto']                       = $__admin .'/home/zip_upload';

/* PROGRAMAS ------------------------------------------------------- */

$route['backoffice/programas']                                  = $__admin .'/home/getPrograms';
$route['backoffice/programa/(:any)']                            = $__admin .'/home/getProgram/$1';
$route['backoffice/programa/(:any)/editar']                     = $__admin .'/home/editProgram/$1';
$route['backoffice/programas/nuevo']                            = $__admin .'/home/newProgram';
$route['backoffice/programas/p/(:any)']                         = $__admin .'/home/getPrograms/$1';

/* RECURSOS ------------------------------------------------------- */

$route['backoffice/recursos']                                   = $__admin .'/home/getResources';
$route['backoffice/recurso/(:any)']                             = $__admin .'/home/getResource/$1';
$route['backoffice/recurso/(:any)/editar']                      = $__admin .'/home/editResource/$1';
$route['backoffice/recursos/nuevo']                             = $__admin .'/home/newResource';
$route['backoffice/recursos/p/(:any)']                          = $__admin .'/home/getResources/$1';
$route['backoffice/recursos/subir']                             = $__admin .'/home/resource_upload';

/* ROLES ------------------------------------------------------- */

$route['backoffice/roles']                                      = $__admin .'/home/getRoles';
$route['backoffice/role/(:any)']                                = $__admin .'/home/getRole/$1';
$route['backoffice/role/(:any)/editar']                         = $__admin .'/home/editRole/$1';
$route['backoffice/roles/nuevo']                                = $__admin .'/home/newRole';
$route['backoffice/roles/p/(:any)']                             = $__admin .'/home/getRoles/$1';
$route['backoffice/roles/subir']                                = $__admin .'/home/role_upload';

/* SOLICITUDES ------------------------------------------------------- */

$route['backoffice/solicitudes']                                = $__admin .'/home/getRequests'; // INFO | Desactivado
$route['backoffice/solicitud/(:any)']                           = $__admin .'/home/getRequest/$1'; // INFO | Desactivado
$route['backoffice/solicitud/(:any)/editar']                    = $__admin .'/home/editRequest/$1'; // TODO | Hacer que el checkbox funcione
$route['backoffice/solicitudes/nuevo']                          = $__admin .'/home/newRequest'; // TODO | Hacer que el checkbox funcione
$route['backoffice/solicitudes/p/(:any)']                       = $__admin .'/home/getRequests/$1'; // INFO | Desactivado

/* TUTORIALES ------------------------------------------------------- */

$route['backoffice/tutoriales']                                 = $__admin .'/home/getTutorials';
$route['backoffice/tutorial/(:any)']                            = $__admin .'/home/getTutorial/$1';
$route['backoffice/tutorial/(:any)/editar']                     = $__admin .'/home/editTutorial/$1';
$route['backoffice/tutoriales/nuevo']                           = $__admin .'/home/newTutorial';
$route['backoffice/tutoriales/p/(:any)']                        = $__admin .'/home/getTutorials/$1';

/* USUARIOS ------------------------------------------------------- */

$route['backoffice/usuarios']                                   = $__admin .'/home/getUsers';
$route['backoffice/usuario/(:any)']                             = $__admin .'/home/getUser/$1';
$route['backoffice/usuario/(:any)/editar']                      = $__admin .'/home/editUser/$1';
$route['backoffice/usuarios/nuevo']                             = $__admin .'/home/newUser';
$route['backoffice/usuarios/p/(:any)']                          = $__admin .'/home/getUsers/$1';

/* -----X----- ADMIN -----X----- */

/* ----------- FRONT ----------- */

$route['banco-de-recursos']                                     = 'resource';
$route['banco-de-recursos/pag/(:any)']                          = 'resource/getResources/$1';
$route['banco-de-recursos/categoria/(:any)']                    = 'taxonomyresource/getTaxonomyResource/$1';
$route['banco-de-recursos/categoria/(:any)/pag/(:any)']         = 'taxonomyresource/getTaxonomyResourcePage/$1/$2';
$route['banco-de-recursos/categorias']                          = 'taxonomyresource';
$route['banco-de-recursos/categorias/pag/(:any)']               = 'taxonomyresource/getTaxonomyResources/$1';
$route['recurso/(:any)']                                        = 'resource/getResource/$1';
$route['recurso/(:any)/descargar']                              = 'resource/downloadResource/$1'; // TODO | Hacer descarga de foto

$route['herramientas-para-estudiantes']                         = 'tool/students';
$route['herramientas-para-estudiantes/pag/(:any)']              = 'tool/students/$1';
$route['herramientas-para-docentes']                            = 'tool/teachers';
$route['herramientas-para-docentes/pag/(:any)']                 = 'tool/teachersPage/$1';

$route['objetos-de-aprendizaje']                                = 'elearning';
$route['objetos-de-aprendizaje/pag/(:any)']                     = 'elearning/getObjects/$1';
$route['objetos-de-aprendizaje/categoria/(:any)']               = 'taxonomyelearning/getTaxonomyObject/$1';
$route['objetos-de-aprendizaje/categoria/(:any)/pag/(:any)']    = 'taxonomyelearning/getTaxonomyObjectPage/$1/$2';
$route['objetos-de-aprendizaje/categorias']                     = 'taxonomyelearning';
$route['objetos-de-aprendizaje/categorias/pag/(:any)']          = 'taxonomyelearning/getTaxonomyObjects/$1';

$route['quienes-somos']                                         = 'about';

$route['tutoriales-para-estudiantes']                           = 'tutorial/students';
$route['tutoriales-para-estudiantes/pag/(:any)']                = 'tutorial/getTutorialsStudents/$1';

$route['tutoriales-para-docentes']                              = 'tutorial/teachers';
$route['tutoriales-para-docentes/pag/(:any)']                   = 'tutorial/getTutorialsTeachers/$1';

$route['default_controller']                                    = 'home';
$route['404_override']                                          = 'cuatrocientoscuatro';
$route['translate_uri_dashes']                                  = FALSE;

$route[LOGIN_PAGE]                                              = $__admin .'/login';

/* ----------- FRONT -----X----- */