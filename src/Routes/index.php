<?php

use App\Controllers\DashboardController;
use App\Controllers\JournalController;
use App\Router;

$router = new Router();
/*
$router->get('/journals', JournalController::class, 'index');
$router->get('/journals/details', JournalController::class, 'details')
;
$router->get('/journals/edit', JournalController::class, 'edit');
$router->post('/journals/edit', JournalController::class, 'update');

$router->get('/journals/delete', JournalController::class, 'delete');
$router->post('/journals/delete', JournalController::class, 'remove');

$router->post('/journals/create', JournalController::class, 'create');
*/
$router->get('/', DashboardController::class, 'index');
$router->dispatch();
