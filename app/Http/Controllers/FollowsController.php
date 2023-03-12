<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;

class FollowsController extends Controller
{
    public function followList(User $data)
   {
    $following_id = Auth::user()->follow()->pluck('following_id');
    $follow_list = User::with('user')->follow()->whereIn('user_id' , $following_id) -> get();
       return view('follows.followList' ,compact('posts'));
   }

   public function followerList(User $data)
   {
    $following_id = Auth::user()->follow()->pluck('following_id');
    $follow_list = User::with('user')->follow()->whereIn('user_id' , $following_id) -> get();
       return view('follows.followerList' ,compact('posts'));
   }
}
//web.phpとつなげる（ルーティング）
//function～がメソッド
