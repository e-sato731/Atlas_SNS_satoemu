<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follow;
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

}
