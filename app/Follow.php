<?php

namespace App;

use Auth;
use Validator;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
     protected $fillable = [
    'following_id', 'followed_id'
  ];


    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    // フォローしているユーザーを取得
    public function follows()
   {
     return $this->belongsToMany('App\Models\User', 'follows', 'following_id', 'followed_id');
   }

   //フォロワーのユーザーを取得
   public function followers()
   {
     return $this->belongsToMany('App\Models\User', 'follows', 'followed_id', 'following_id');
   }
}
