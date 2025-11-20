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
        if(!$model->validate()){
//            dump($model->getErrors());
            return view('contact', ['title' => 'Contact form', 'errors' => $model->getErrors()]);
        }
        response()->redirect('/');
        return 'Contact form POST page';
    }
}