<?php

namespace App\Controllers;
use PHPFramework\Application;

class HomeController extends BaseController
{
    public function __construct()
    {
//        echo __METHOD__;
    }

    public function index()
    {
        dump(db());
        dump(app()->db);
        dump(Application::$app->db);

        return view('home');
//        return view('home', ['name' => 'John', 'age' => 30], 'default');
//        return 'Test page';
    }

    public function contact()
    {
        return 'Contact page';
    }
}