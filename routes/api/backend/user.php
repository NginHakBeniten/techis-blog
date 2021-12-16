<?php

$controller = 'UserController';

$router->group([
    'prefix' => 'users',
    'middleware' => ['auth', 'admin']
], function () use ($router, $controller) {
    $router
        ->get('', "$controller@index")
        ->get('{id}', "$controller@show")
        ->post('', "$controller@store")
        ->put('{id}', "$controller@update")
        ->delete('{id}', "$controller@delete");
});
