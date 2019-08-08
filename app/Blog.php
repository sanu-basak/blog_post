<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
  
    protected $fillable = ['title','content','image'];

    public function users()
    {
        return $this->belongsTo(App/User);
    }

    public function comment(){

        return $this->hasMany('App\Comment','blog_id','id');
    }

}
