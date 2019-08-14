<?php

namespace admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table name
    public $table= "posts";
    protected $guarded= [];
}
