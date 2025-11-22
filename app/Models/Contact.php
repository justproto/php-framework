<?php

namespace App\Models;

use PHPFramework\Model;

class Contact extends Model
{
    protected array $fillable = ['email', 'content', 'name', 'username'];
    protected array $rules = [
            'required' => ['email', 'content', 'name'],
            'email' => ['email'],
            'lengthMin' => [
                ['email', 5],
                ['content', 20]
            ],
            'lengthMax' => [
            ['email', 90],
            ],
    ];

    protected array $labels = [
        'name' => 'Field "Name"',
        'email' => 'Field "E-mail"',
        'content' => 'Field "Content"',
    ];
}