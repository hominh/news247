<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $timestamps = true;
    protected $table = 'videos';

    protected $fillable = ['name','alias','intro','title','description','keyword','url','thumb','status','user_id'];


}
