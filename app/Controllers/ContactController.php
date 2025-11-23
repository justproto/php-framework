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
            session()->setFlash('error', 'Validation errors');
            session()->set('form_errors', $model->getErrors());
            session()->set('form_data', $model->attributes);
//            return view('contact', ['title' => 'Contact form', 'errors' => $model->getErrors()]);
            return view('contact', ['title' => 'Contact form']);
        } else {
            session()->setFlash('success', 'Successfully validation');
        }
//        if(!$model->validateCustom()){
//            return view('contact', ['title' => 'Contact form', 'errors' => $model->getErrors()]);
//        }
        response()->redirect('/');
        return '';
    }

}