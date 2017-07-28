<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = true;
    protected $table = 'categories';

    protected $fillable = ['name','alias','title','keyword','description','parent_id','hassub','status','user_id'];

    public function post()
    {
    	return $this->hasMany('App\Post');
    }
}
