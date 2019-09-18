<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Album extends Model
{
    protected $fillable = ['name','description','cover_image'];

    public function photos(){
        return $this->hasMany('App\Photo');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }
}
