<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use Auth;
use Validator;

class PostsController extends Controller
{
//表示するメソッド
    public function index(Request $request){
        $posts = Post::get();
        return view('posts.index',['post'=> $posts]);
    }

//投稿するメソッド
    public function create(Request $request)
    {
      $post = $request->input
      ('newPost');
      $user = Auth::user()->id;
      //dd($post);
      \DB::table('posts')->insert([
     'post' => $post,
     'user_id' => $user,
]);

return redirect('top');
}

//削除するメソッド
 public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('top');
    }

//編集するメソッド
 public function update(Request $request)
    {
        $id = $request->input('id');
        $post = $request->input('upPost');
        \DB::table('posts')
          ->where('id',$id)
          ->update(
            ['posts' => $post]
        );

        return redirect('top');
    }
}
