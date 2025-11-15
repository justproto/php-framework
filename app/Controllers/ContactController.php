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
        dump($_POST);
        return 'Contact form POST page';
    }
}