<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Site::index');

$routes->match(['get', 'post'], 'login', 'UserController::login');
$routes->get('logout', 'UserController::logout');
$routes->get('add-user', 'UserController::addUser', ['filter' => 'auth']);
$routes->get('save-user', 'UserController::saveUser', ['filter' => 'auth']);

$routes->get('fullcalendar', 'CalendarController::index', ['filter' => 'auth']);
$routes->get('event', 'CalendarController::loadData', ['filter' => 'auth']);
$routes->post('add-event', 'CalendarController::addEvent', ['filter' => 'auth']);

$routes->match(['get', 'post'], 'add-member', 'MemberController::addMember', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'edit-member/(:num)', 'MemberController::editMember/$1', ['filter' => 'auth']);
$routes->get('list-members', 'MemberController::listMember');
$routes->get('delete-member/(:num)','MemberController::deleteMember/$1', ['filter' => 'auth']);

$routes->get('people', 'PersonController::index');
$routes->get('add-person', 'PersonController::addPerson', ['filter' => 'auth']);
$routes->get('delete-person/(:num)', 'PersonController::deletePerson/$1', ['filter' => 'auth']);
$routes->get('person/(:num)', 'PersonController::getPerson/$1', ['filter' => 'auth']);

$routes->match(['get', 'post'], 'add-student', 'StudentController::addStudent', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'edit-student/(:num)', 'StudentController::editStudent/$1', ['filter' => 'auth']);
$routes->get('list-students', 'StudentController::listStudent');
$routes->get('delete-student/(:num)','StudentController::deleteStudent/$1', ['filter' => 'auth']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
