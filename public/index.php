<?php

    require_once __DIR__.'/../vendor/autoload.php';

    use app\Router;
    use app\controllers\ProductController;

    $router = new Router($database);
    $database = new \app\Database();

    $router->get('/', [ProductController::class, 'index']);
    $router->get('/products', [ProductController::class, 'index']);
    $router->get('/products/index', [ProductController::class, 'index']);
    $router->get('/products/create', [ProductController::class, 'create']);
    $router->post('/products/create', [ProductController::class, 'create']);

    $router->resolve();
?>