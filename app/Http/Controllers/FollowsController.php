<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\Follow;

class FollowsController extends Controller
{
    public function followList()
   {
    //フォローしているユーザーのIDを取得
    $following_id = Auth::user()->follows()->pluck('followed_id');
    $following_users = User::with('user')->follows()->whereIn('user_id' , $following_id) -> get();
       return view('follows.followList' ,compact('following_users'));
   }

   public function followerList()
   {
    //フォローされているユーザーのIDを取得
    $followed_id = Auth::user()->follows()->pluck('following_id');
    $followed_users = User::with('user')->follows()->whereIn('user_id' , $following_id) -> get();
       return view('follows.followerList' ,compact('posts'));
   }
}
//web.phpとつなげる（ルーティング）
//function～がメソッド
