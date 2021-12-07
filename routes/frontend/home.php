<?php

$router->get('/', [
    'uses' => 'HomeController@index',
    'as' => 'index'
]);
$router->get('/{tag}', [
    'uses' => 'HomeController@index',
    'as' => 'tag.index'
]);
$router->get('/{tag}/{article}', [
    'uses' => 'HomeController@index',
    'as' => 'tag.article.index'
]);
// $router->get('/{tag}', 'HomeController@index')->name('tag.index');
// $router->get('/{tag}/{article}', 'HomeController@index');
// $router->get('/{route:.*}/', 'HomeController@index');
