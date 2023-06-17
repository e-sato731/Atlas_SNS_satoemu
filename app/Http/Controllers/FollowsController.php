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
    $following_id = Follow::where('following_id', auth()->id())->get();
    $posts = Post::whereIn('user_id', $following_id->pluck('following_id'))->get();
    return view('follows.followList', compact('following_id','posts'));
   }

   public function followerList()
   {
    //フォローされているユーザーのIDを取得
    $followed_id = Follow::where('followed_id', auth()->id())->get();
    $posts = Post::whereIn('user_id', $followed_id->pluck('followed_id'))->get();
       return view('follows.followerList' ,compact('followed_id','posts'));
   }


    public function follow(Request $request)
    {
        $followerId = Auth::id();
        $userId = $request->input('user_id');

        $follow = Follow::where('following_id', $followerId)
            ->where('followed_id', $userId)
            ->first();

        if ($follow) {
            // アンフォロー
            $follow->delete();
        } else {
            // フォロー
            Follow::create([
                'following_id' => $followerId,
                'followed_id' => $userId,
            ]);
        }

        return redirect('/search');
    }
}
//web.phpとつなげる（ルーティング）
//function～がメソッド
