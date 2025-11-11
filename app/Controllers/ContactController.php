<?php

namespace App\Controllers;

use PHPFramework\Controller;

class ContactController extends Controller
{

    public function index()
    {
        $title = 'Contacts';
        $name = 'John';
        return view('contact',  compact('title', 'name'));
//        return view('contact', ['title' => $title, 'name' => $name]);
//        return view('contact', ['title' => 'Page with contacts', 'name' => 'Author']);
//        return view()->render('contact');
//        return $this->render('contact');
//        return app()->view->render('contact');
//        return 'Contact form page';
    }

    public function send()
    {
        return 'Contact form POST page';
    }
}