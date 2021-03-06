<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function () {
    return 'Hello world';
});

$app->run();


$app->get('/hello/{name}', function ($name) use ($app) {

    return 'Hello ' . $app->escape($name);

});


$app->run();