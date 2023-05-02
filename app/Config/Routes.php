<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->post('/auth', 'Login::auth');
// $routes->get('/denied', 'Login::denied');
$routes->get('/logout', 'Login::logout');

$routes->get('/home', 'Home::index', ['filter' => 'auth']); //filter home page from unauthorize access
$routes->get('/new', 'Process::new', ['filter' => 'auth']);

// add new isyifaa aduan form
$routes->get('/newisyifaa', 'Process::newisyifaa', ['filter' => 'auth']);
$routes->post('/createisyifaa', 'Process::createisyifaa', ['filter' => 'auth']);

// ambikanak
// add new isyifaa aduan form
$routes->get('/ambikanak', 'Anak::index', ['filter' => 'auth']);
$routes->get('/saveambikanak', 'Anak::saveambikanak', ['filter' => 'auth']);

$routes->post('/create', 'Process::create', ['filter' => 'auth']);
$routes->get('/read/(\d+)', 'Process::read/$1', ['filter' => 'auth']);
$routes->post('/attend/(\d+)', 'Process::attend/$1', ['filter' => 'auth']);
$routes->get('/cancel/(\d+)', 'Process::cancel/$1', ['filter' => 'auth']);
$routes->get('/completed/(\d+)', 'Process::completed/$1', ['filter' => 'auth']);
$routes->get('/completedbytech/(\d+)', 'Process::completedbytech/$1', ['filter' => 'auth']);
$routes->get('/toupdate/(\d+)', 'Process::toupdate/$1', ['filter' => 'auth']);
$routes->post('/doupdate', 'Process::doupdate', ['filter' => 'auth']);

$routes->get('/techreport', 'Report::index', ['filter' => 'auth']);
$routes->get('/allreport', 'Report::allreport', ['filter' => 'auth']);
$routes->get('/monthly/(:any)/(:any)', 'Report::monthly/$1/$2', ['filter' => 'auth']);
$routes->get('/cumulative/(:any)', 'Report::cumulative/$1', ['filter' => 'auth']);
$routes->get('/readme', 'Report::readme', ['filter' => 'auth']);

$routes->get('/managetech', 'Staf::index', ['filter' => 'auth']);
$routes->post('/addnewstaf', 'Staf::addnewstaf', ['filter' => 'auth']);
$routes->get('/setaccess/(\d+)/(\d+)', 'Staf::setaccess/$1/$2', ['filter' => 'auth']);

$routes->get('/newcaselist/(\d+)', 'Process::newcaselist/$1', ['filter' => 'auth']);
$routes->get('/inprogresslist/(\d+)', 'Process::inprogresslist/$1', ['filter' => 'auth']);
$routes->get('/completelist/(\d+)', 'Process::completelist/$1', ['filter' => 'auth']);
$routes->get('/canceledlist/(\d+)', 'Process::canceledlist/$1', ['filter' => 'auth']);

$routes->get('/contact', 'Contact::index', ['filter' => 'auth']);
$routes->post('/send', 'Contact::send', ['filter' => 'auth']);
$routes->get('/complaint', 'Contact::complaint', ['filter' => 'auth']);
$routes->get('/fix/(\d+)/(\d+)', 'Contact::fixInprogress/$1/$2', ['filter' => 'auth']);
$routes->get('/deletecomp/(\d+)', 'Contact::deletecomp/$1', ['filter' => 'auth']);

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
