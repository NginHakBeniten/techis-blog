<?php

$controller = 'AuthController';

$router->group([
    'prefix' => 'auth',
], function () use ($router, $controller) {
    $router
        ->post('login', "$controller@login")
        ->get('me', "$controller@me")
        ->post('logout', "$controller@logout");
});
