<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;
class Photo extends Model
{
    protected $fillable = ['album_id','description','photo','title','size'];

    public function albums(){
        return $this->belongsTo('App\Album');
    }
}
