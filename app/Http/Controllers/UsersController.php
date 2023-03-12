<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

//User.phpからユーザー情報を取り出す

class UsersController extends Controller
{
    //プロフィールを表示する・既存情報を初期値に設定するメソッド
    public function profile(Request $request){
        $user = Auth::user();
        return view('users.profile', compact('user'));
        // dd($user);
    }

    //ユーザー情報を取得するメソッド
    public function search(Request $request){
        $data = User::get();

    //入力された値を取得するメソッド
        $keyword = $request->input('search');


        $query = User::query();

        if(!empty($keyword)) {
            $query->where('username', 'LIKE', "%{$keyword}%");
        }

        $data = $query->get();

       return view('users.search')
        ->with([
            'data' => $data,
            'keyword' => $keyword,
        ]);//()には変数が入る
    }

public function follow(User $data)
   {
       $follower = auth()->user();
       // フォローしているか
       $is_following = $follower->isFollowing($data->id);
       if(!$is_following) {
           // フォローしていなければフォローする
           $follower->follow($data->id);
           return back();
       }
   }

   // フォロー解除
   public function unfollow(User $data)
   {
       $follower = auth()->user();
       // フォローしているか
       $is_following = $follower->isFollowing($data->id);
       if($is_following) {
           // フォローしていればフォローを解除する
           $follower->un_follow($data->id);
           return back();
       }
   }

   public function upload(Request $request)
    {
        // ディレクトリ名
        $dir = 'sample';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // sampleディレクトリに画像を保存
        $request->file('image')->store('public/' . $dir);

        return redirect('/');
    }
}
