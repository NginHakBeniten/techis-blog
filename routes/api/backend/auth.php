<?php

$router->group([
    'prefix' => 'auth',
], function () use ($router) {
    $router
        ->post('login', 'AuthController@login')
        ->get('me', 'AuthController@me')
        ->post('logout', 'AuthController@logout');
});
