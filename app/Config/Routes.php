<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Page');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('', 'Pages::index');
$routes->get('login', 'Admin/Login::index');
$routes->group('admin', ['filter' => 'auth'], function($routes){
	$routes->get('logout', 'Admin/Login::logout');
	$routes->get('profile', 'Admin/User::profile');
	$routes->get('dashboard', 'Admin/Dashboard::index');
	$routes->group('menu', function($routes){
		$routes->get('/', 'Admin/Menu::index');
		$routes->get('create', 'Admin/Menu::create');
		$routes->post('delete', 'Admin/Menu::delete');
	});
	$routes->group('category', function($routes){
		$routes->get('/', 'Admin/Category::index');
		$routes->get('create', 'Admin/Category::create');
		$routes->post('delete', 'Admin/Category::delete');
	});
	$routes->group('testimonial', function($routes){
		$routes->get('/', 'Admin/Testimonial::index');
		$routes->get('create', 'Admin/Testimonial::create');
		$routes->post('delete', 'Admin/Testimonial::delete');
	});
	$routes->get('about', 'Admin/About::index');
});
$routes->get('user', 'Admin/User::index', ['filter' => 'admin']);
/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
