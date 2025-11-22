<?php

namespace App\Controllers;
class HomeController extends BaseController
{
    public function __construct()
    {
//        echo __METHOD__;
    }

    public function index()
    {
        return view('home', ['name' => 'John', 'age' => 30], 'default');
//        return 'Test page';
    }

    public function contact()
    {
        return 'Contact page';
    }
}