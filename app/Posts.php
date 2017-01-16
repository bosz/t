<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'slug', 'author', 'content', 'status', 'category', 'gender', 'tags', 'date','count'];
}
