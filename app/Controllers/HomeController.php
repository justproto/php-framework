<?php

namespace App\Controllers;
class HomeController
{
    public function __construct()
    {
//        echo __METHOD__;
    }

    public function test()
    {
        return 'Test page';
    }

    public function contact()
    {
        return 'Contact page';
    }
}