<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Follow;
use App\Post;
use Auth;
use Validator;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'username',
        'mail',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'password-confirm',
        'remember_token',
    ];

     public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function follows()
    {
        return $this->hasMany('App\Follow');
    }


   // フォローしているユーザーの取得
    public function followings()
   {
     return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
   }

   //フォローされているユーザーの取得
   public function followers()
   {
     return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
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

   // フォローしているか
    public function isFollowing(User $user)
    {
         return $this->followings()->where('users.id', $user->id)->exists();
}

   // デフォルトアイコンのパスを返す
public function DefaultIcon()
{
    return asset('images/icon1.png');
}

}
