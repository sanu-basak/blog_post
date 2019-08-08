<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
  protected  $guarded =[];

  public function blog()
  {
      return $this->belongsTo('App\Blog');
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }
 
  public function reply()
  {
      return $this->hasMany('App\Reply','comment_id','id');
  } 

}

 