<?php

namespace App\Controllers;

use App\Models\Contact;
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
        $model = new Contact();
        $model->loadData();
        $model->validate();

        return 'Contact form POST page';
    }
}