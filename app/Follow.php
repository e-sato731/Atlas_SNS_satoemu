<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Follow;
use App\Post;
use Auth;
use Validator;

class Follow extends Authenticatable
{
  use Notifiable;

     protected $table = 'follows';

     protected $fillable = [
            'following_id',
            'followed_id'
  ];


    // フォローしているユーザーの取得
    public function followings()
{
    return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followed_id');
}

    //フォローされているユーザーの取得
public function followers()
{
    return $this->belongsToMany('App\User', 'follows', 'followed_id', 'follower_id');
}

//     //フォローする
// public function follow(User $data)
// {
//     $this->followings()->attach($data->id);
// }

//    //フォロー解除する
// public function unfollow(User $data)
// {
//     $this->followings()->detach($data->id);
// }

//     //フォローされているか判断する
// public function isFollowed(User $data)
// {
//     return $this->followings()->where('following_id', $data->id)->exists();
// }

}
