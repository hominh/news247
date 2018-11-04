<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public $timestamps = true;
    protected $table = 'configs';

    protected $fillable = ['logo','title','description','keyword','address','email','skype','phone','user_id'];
}
