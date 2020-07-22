<?php

declare(strict_types=1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use Hyperf\HttpServer\Router\Router;

# index
Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');
# user
Router::addGroup('/user/', function () {
    Router::get('index', 'App\Controller\UserController@index');
    Router::get('[{id:\d+}]', 'App\Controller\UserController@info');
    Router::put('[{id:\d+}]', 'App\Controller\UserController@update', [
        'middleware' => [\Phper666\JwtAuth\Middleware\JwtAuthMiddleware::class]
    ]);
    Router::delete('[{id:\d+}]', 'App\Controller\UserController@delete');
    Router::post('create', 'App\Controller\UserController@create');
});
# user-auth
Router::addGroup('/user-auth/', function () {
    Router::put('[{id:\d+}]', 'App\Controller\UserAuthController@update', [
        'middleware' => [\Phper666\JwtAuth\Middleware\JwtAuthMiddleware::class]
    ]);
    Router::post('[{id:\d+}]', 'App\Controller\UserAuthController@create', [
        'middleware' => [\Phper666\JwtAuth\Middleware\JwtAuthMiddleware::class]
    ]);
});
# auth
Router::addGroup('/auth/', function () {
    Router::post('login', 'App\Controller\AuthController@login');
    Router::get('logout', 'App\Controller\AuthController@logout', [
        'middleware' => [\Phper666\JwtAuth\Middleware\JwtAuthMiddleware::class]
    ]);
});