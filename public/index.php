<?php

use PHPFramework\Application;

if(PHP_MAJOR_VERSION < 8){
    die('Require PHP version is 8.0+');
}

require_once __DIR__ . "/../config/init.php";
require_once ROOT . "/vendor/autoload.php";
require_once HELPERS . '/helpers.php';

$app = new Application();
require_once CONFIG . '/routes.php';

//dump($app);
//dump(app());
//dump($app->request->getMethod());
//dump($app->request->isGet());
//dump(request()->isPost());
//dump(request()->isAjax());
//dump($app->request->get('page'));
//dump(request()->post('page', '10'));

//dump($app->router->getRoutes());
//echo call_user_func($app->router->getRoutes()['POST']['/contact']);

//dump($app->request->get('page'));
//dump($app->request->get('search', 'default'));

$app->run();