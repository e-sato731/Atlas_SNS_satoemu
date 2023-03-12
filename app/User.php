<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use Follow;
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
        'password-comfirm',
        'bio',
        'icon-image',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function posts() {
        return $this->hasMany('App\Post','username');
    }

     // フォローする
   public function follow(User $user_id)
   {
       return $this->follows()->attach($user_id);
   }

   // フォロー解除する
   public function unfollow(User $user_id)
   {
       return $this->follows()->detach($user_id);
   }

}
