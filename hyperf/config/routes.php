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
    Router::put('[{id:\d+}]', 'App\Controller\UserController@update');
    Router::delete('[{id:\d+}]', 'App\Controller\UserController@delete');
    Router::post('create', 'App\Controller\UserController@create');
});
# user-auth
Router::addGroup('/user-auth/', function () {
    Router::put('[{id:\d+}]', 'App\Controller\UserAuthController@update');
    Router::post('[{id:\d+}]', 'App\Controller\UserAuthController@create');
});