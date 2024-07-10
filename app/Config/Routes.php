<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
use App\Controllers\Home;

$routes->get('/', [Home::class, 'index']);

use App\Controllers\Login;

$routes->get('/login', [Login::class, 'LoginPage']);
$routes->post('/autenticazione', [Login::class, 'autenticazione']);
$routes->get('/logout', [Login::class, 'logout']);

use App\Controllers\Registrazione;

$routes->get('/registrazione', [Registrazione::class, 'RegistrazionePage']);
$routes->post('/registra', [Registrazione::class, 'registra']);

use App\Controllers\Platform;

$routes->get('/platform', [Platform::class, 'PlatformPage']);
$routes->post('/submit-platform', [Platform::class, 'submitPlatform']);

use App\Controllers\Deploy;

$routes->get('/deployPage', [Deploy::class, 'deployPage']);
$routes->post('/submit-model', [Deploy::class, 'deployModel']);

use App\Controllers\Model;

$routes->get('/model/(:num)', [Model::class, 'viewModel/$1']);

use App\Controllers\Webinar;

$routes->get('/webinar', [Webinar::class, 'webinarPage']);
$routes->post('/submitWebinar', [Webinar::class, 'submitWebinar']);
$routes->get('/webinar/(:num)', [Webinar::class, 'viewWebinar/$1']);

use App\Controllers\Transaction;

$routes->get('/purchase/(:num)', [Transaction::class, 'purchase/$1']);
$routes->get('/register/(:num)', [Transaction::class, 'register/$1']);
$routes->post('/iscriviti', [Transaction::class, 'iscriviti']);
$routes->post('/download', [Transaction::class, 'download']);

use App\Controllers\CustomerProfile;

$routes->get('/profile', [CustomerProfile::class, 'index']);

use App\Controllers\Subscription;

$routes->get('/subscription', [Subscription::class, 'subscriptionPage']);

use App\Controllers\History;

$routes->get('/history', [History::class, 'historyPage']);
$routes->post('/addVersion', [History::class, 'addVersion']);

use App\Controllers\High;

$routes->post('/add', [High::class, 'add']);
