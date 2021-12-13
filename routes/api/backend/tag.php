<?php

$controller = 'TagController';

$router->group([
    'prefix' => 'tags',
    'middleware' => 'auth'
], function () use ($router, $controller) {
    $router
        ->get('', "$controller@index")
        ->get('{id}', "$controller@show")
        ->post('', "$controller@store")
        ->put('{id}', "$controller@update")
        ->delete('{id}', "$controller@delete");
});
