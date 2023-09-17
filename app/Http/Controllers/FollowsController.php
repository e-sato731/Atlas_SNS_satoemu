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
    $posts = Post::whereIn('id', $following_id->pluck('following_id'))->get();
    return view('follows.followList', compact('following_id','posts'));
   }

   public function followerList()
   {
    //フォローされているユーザーのIDを取得
    $followed_id = Follow::where('followed_id', auth()->id())->get();
    $posts = Post::whereIn('id', $followed_id->pluck('followed_id'))->get();
       return view('follows.followerList' ,compact('followed_id','posts'));
   }


    //フォローする
    public function follow($id)
{
    $loggedInUser = Auth::user()->id;
// dd($id);
     \DB::table('follows')->insert([
     'followed_id' => $id,
     'following_id' => $loggedInUser,
]);

return redirect('/search');
}
    // if ($loggedInUser->isFollowing($id)) {
    //     // 既にフォローしている場合はアンフォロー
    //     $loggedInUser->unfollow($id);
    // } else {
    //     // フォローしていない場合はフォロー
    //     $loggedInUser->follow($id);
    // }


    //フォロー解除する
public function unfollow($id)
{
    $loggedInUser = Auth::user()->id;
    \DB::table('follows')
            ->where('followed_id', $id)
            ->where('following_id', $loggedInUser)
            ->delete();

        return redirect('/search');
    }
}
//web.phpとつなげる（ルーティング）
//function～がメソッド
