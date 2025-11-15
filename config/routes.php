<?php

/** $var \PHPFramework\Application $app */

$app->router->get('/', function (){
    return view('main', ['title' => 'Home page'], 'test');
});

$app->router->get('/about', function (){
    return view('about');
});

$app->router->get('/contact', [\App\Controllers\ContactController::class, 'index']);
$app->router->post('/contact', [\App\Controllers\ContactController::class, 'send']);


//$app->router->add('/', function () {
//    return 'Hello from home';
//}, ['post', 'get']);

$app->router->get('test', [\App\Controllers\HomeController::class, 'test']);
//$app->router->get('/contact/', [\App\Controllers\HomeController::class, 'contact']);

$app->router->get('/post/(?P<slug>[a-z0-9-]+)/?', function (){
    return '<p>Some post</p>';
});

//dump($app->router->getRoutes());