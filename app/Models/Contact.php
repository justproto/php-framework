<?php

namespace App\Models;

use PHPFramework\Model;

class Contact extends Model
{

    public array $fillable = ['email', 'content', 'name', 'username'];
    public array $attributes = [];
    public array $rules = [
        'name' => ['required' => true],
        'email' => ['email' => true, 'min' => 5, 'max' => 90],
        'content' => ['min' => 20],
    ];

    public array $labels = [
        'name' => 'Name',
        'email' => 'E-mail',
        'content' => 'Content',
    ];
}