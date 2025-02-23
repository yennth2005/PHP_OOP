<?php

use App\Controllers\Client\HomeController;

$router->get('/', HomeController::class .'@index');
$router->get('/about',function(){
    echo 'about page';
});
$router->get('/detail/{id}', HomeController::class .'@detail');
$router->get('/products', HomeController::class .'@products');
$router->get('/category/{id}', HomeController::class .'@category');