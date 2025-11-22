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

    public function store()
    {
        $model = new Contact();
        $model->loadData();
        if(!$model->validate()){
            return view('contact', ['title' => 'Contact form', 'errors' => $model->getErrors()]);
        }
//        if(!$model->validateCustom()){
//            return view('contact', ['title' => 'Contact form', 'errors' => $model->getErrors()]);
//        }
        response()->redirect('/');
        return 'Contact form POST page';
    }
}