<?php

use App\Controllers\Admin\BannerController;
use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\ProductController;
use App\Controllers\Admin\UserController;


$router->mount('/admin', function () use ($router) {
    $router->get('/', DashboardController::class .'@index');

    //Users
    $router->get('/users',UserController::class .'@index');
    $router->get('/users/delete/{id}',UserController::class .'@delete');
    $router->get('/users/create',UserController::class .'@create');
    $router->post('/users/insert',UserController::class .'@insert');
    $router->get('/users/edit/{id}',UserController::class .'@edit');
    $router->post('/users/update/{id}',UserController::class .'@update');
    $router->get('/users/detail/{id}',UserController::class .'@detail');
    
    
    // $router->post('/users/test',UserController::class .'@test');
    //Categories
    $router->get('/categories',CategoryController::class .'@index');
    $router->get('/categories/delete/{id}',CategoryController::class .'@delete');
    $router->get('/categories/create',CategoryController::class .'@create');
    $router->post('/categories/insert',CategoryController::class .'@insert');
    $router->get('/categories/edit/{id}',CategoryController::class .'@edit');
    $router->post('/categories/update/{id}',CategoryController::class .'@update');
    $router->get('/categories/detail/{id}',CategoryController::class .'@detail');
    
    //banners

    $router->get('/banners',BannerController::class .'@index');
    $router->get('/banners/delete/{id}',BannerController::class .'@delete');
    $router->get('/banners/detail/{id}',BannerController::class .'@detail');
    $router->get('/banners/create',BannerController::class .'@create');
    $router->post('/banners/insert',BannerController::class .'@insert');
    $router->get('/banners/edit/{id}',BannerController::class .'@edit');
    $router->post('/banners/update/{id}',BannerController::class .'@update');
    
    //Products
    $router->get('/products', ProductController::class . '@index');
    $router->get('/products/create', ProductController::class . '@create');
    $router->post('/products/insert', ProductController::class . '@insert');
    $router->get('/products/detail/{id}', ProductController::class . '@detail');
    $router->get('/products/delete/{id}', ProductController::class . '@delete');
    $router->get('/products/edit/{id}', ProductController::class . '@edit');
    $router->post('/products/update/{id}', ProductController::class . '@update');
});
