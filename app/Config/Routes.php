<?php

namespace Config;

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
// $routes->get('/', 'Home::index');

// Routes Admin dan Penulis
$routes->group('admin', ['filter' => 'auth'],function ($routes) {

	// Umum
	$routes->add('/', 'Admin\Pengguna_A::index');
	$routes->add('profile', 'Admin\Pengguna_A::profile');

	// Route Postingan
	$routes->add('posts', 'Admin\Post_A::read');
	$routes->add('posts/create', 'Admin\Post_A::create');
	$routes->add('posts/view/(:any)', 'Admin\Post_A::view/$1');
	$routes->add('posts/update/(:any)', 'Admin\Post_A::update/$1');
	$routes->add('posts/delete/(:any)', 'Admin\Post_A::delete/$1');
	
	// Route Kategori
	$routes->add('categories', 'Admin\Kategory_A::read');
	$routes->add('categories/create', 'Admin\Kategory_A::create');
	$routes->add('categories/view/(:any)', 'Admin\Kategory_A::view/$1');
	$routes->add('categories/update/(:any)', 'Admin\Kategory_A::update/$1');
	$routes->add('categories/delete/(:any)', 'Admin\Kategory_A::delete/$1');
	
	// Route Komentar
	$routes->add('comments', 'Admin\Komentar_A::read');
	$routes->add('comments/create', 'Admin\Komentar_A::create');
	$routes->add('comments/view/(:any)', 'Admin\Komentar_A::view/$1');
	$routes->add('comments/update/(:any)', 'Admin\Komentar_A::update/$1');
	$routes->add('comments/delete/(:any)', 'Admin\Komentar_A::delete/$1');


});

// Login
$routes->get('/login', 'Auth\Authorisasi::login');

// Register
$routes->get('/register', 'Auth\Authorisasi::register');

// Logout
$routes->get('/logout', 'Auth\Authorisasi::logout');

// Routes Pembaca
$routes->group('reader', function ($routes) {

	$routes->add('/', 'Home::index');


	// Route Postingan
	$routes->add('posts', 'Reader\Post_R::read');
	$routes->add('posts/view/(:any)', 'Reader\Post_R::view/$1');

	// Route Kategori
	$routes->add('categories', 'Reader\Kategory_R::read');
	$routes->add('categories/view/(:any)', 'Reader\Kategory_R::view/$1');

});

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
