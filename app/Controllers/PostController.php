<?php

namespace App\Controllers;

use App\Models\Post;

class PostController extends BaseController
{
    public function create()
    {
        return view('posts/create', ['title' => 'Create post']);
    }

    public function store()
    {
        $model = new Post();
        $model->loadData();

//        if (!$model->validate()){
//            return view('posts/create', ['title' => 'Create post', 'errors' => $model->getErrors()]);
//        }

        if(!$model->validate()){
            session()->setFlash('error', 'Validation errors');
            session()->set('form_errors', $model->getErrors());
            session()->set('form_data', $model->attributes);

        } else {
            session()->setFlash('success', 'Success post validation');
        }
        response()->redirect();
    }
}