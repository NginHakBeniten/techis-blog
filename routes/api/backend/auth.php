<?php


$router->group([
    'prefix' => 'auth',
], function () use ($router) {
    $router
        ->post('login', 'AuthController@login');
});
