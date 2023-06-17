<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Follow;
use Auth;
use Validator;

class Follow extends Authenticatable
{
  use Notifiable;

     protected $table = 'follows';

     protected $fillable = [
            'username',
            'following_id',
            'followed_id'
  ];


    public function user() {
        return $this->hasMany('App\User');
    }

    public $timestamps = false;

      // フォローしているユーザーの取得
    public function followings()
   {
     return $this->belongsToMany('App\Follow', 'follows', 'following_id', 'followed_id');
   }

   //フォローされているユーザーの取得
   public function followers()
   {
     return $this->belongsToMany('App\Follow', 'follows', 'followed_id', 'following_id');
   }

  //フォローする

  public function follow(User $data)
    {
        $this->followings()->attach($data->id);
    }

  //フォロー解除する

  public function unfollow(User $data)
    {
        $this->followings()->detach($data->id);
    }


  // フォローしているかどうかを判定する
  public function isFollowing(User $data)
    {
        return $this->followings()->where('following_id', $data->id)->exists();
    }
}
