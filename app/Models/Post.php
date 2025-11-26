<?php

namespace App\Models;

use PHPFramework\Model;

class Post extends Model
{
    public string $table = 'posts';

    protected array $fillable = ['title', 'content'];

    protected array $rules = [
        'required' => ['title', 'content'],
    ];

    protected array $labels = [
        'title' => 'Post title',
        'content' => 'Post content',
    ];
}