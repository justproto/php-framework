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
//        session()->set('name', 'John');
//        session()->remove('name');
//        $posts = db()->query("SELECT * FROM posts WHERE id > ?", [2])->get();
        $posts = db()->findAll('posts');
        $post = db()->findOrFail('posts', 4);
        return view('home', ['title' => 'Home page', 'posts' => $posts]);
//        return 'Test page';
    }

    public function contact()
    {
        return 'Contact page';
    }
}