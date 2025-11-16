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
    }

    public function send()
    {
        dump(app()->request->getData());
        dump(request()->getData());
        dump($_POST);
        dump(request()->post('email'));
        return 'Contact form POST page';
    }
}