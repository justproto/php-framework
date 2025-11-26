<?php

/** $var \PHPFramework\Application $app */
use App\Controllers\HomeController;
use App\Controllers\ContactController;
use App\Controllers\PostController;
use App\Controllers\UserController;
//
//$app->router->get('/', function (){
//    return view('main', ['title' => 'Home page'], 'default');
//});

$app->router->get('/about', function (){
    return view('about');
});

$app->router->get('/contact', [ContactController::class, 'index']);
$app->router->post('/contact', [ContactController::class, 'store']);

$app->router->get('/', [HomeController::class, 'index']);

$app->router->get('/posts/create', [PostController::class, 'create']);
$app->router->post('/posts/store', [PostController::class, 'store']);

$app->router->get('/register', [UserController::class, 'register']);
$app->router->post('/register', [UserController::class, 'store']);

$app->router->get('/login', [UserController::class, 'login']);


//$app->router->get('/post/(?P<slug>[a-z0-9-]+)/?', function (){
//    return '<p>Some post</p>';
//});
//dump($app->router->getRoutes());

//dump(__FILE__ . __LINE__ , $app->router->getRoutes());