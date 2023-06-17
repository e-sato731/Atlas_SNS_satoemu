<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Follow;
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
        'password','password-confirm', 'remember_token',
    ];


    public function user() {
        return $this->hasMany('App\Post','App\Follow');
    }

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


}
