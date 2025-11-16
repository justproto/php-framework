<?php

namespace App\Controllers;
class HomeController
{
    public function __construct()
    {
//        echo __METHOD__;
    }

    public function index()
    {
        return view('test', ['name' => 'John', 'age' => 30]);
//        return 'Test page';
    }

    public function contact()
    {
        return 'Contact page';
    }
}