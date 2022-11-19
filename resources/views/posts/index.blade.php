<!--bladeは画面に表示する-->
<?php
// メッセージの入力チェック
if( empty($message) ) {
$error_message[] = 'メッセージを入力してください。';
} else {

// 文字数を確認
if( 150 < mb_strlen($message, 'UTF-8') ) {
$error_message[] = '150文字以内で入力してください。';
}

if( empty($error_message) ) {

// 書き込み日時を取得
$current_date = date("Y-m-d H:i:s");
}
}
?>


@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/create']) !!}
     <div class="form-group">
         {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
     </div>
     <input type="image" name="submit" img src="{{asset('images/post.png')}}" alt="送信"></input>
 {!! Form::close() !!}
@foreach ($posts as $post)
            <tr>
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
                 <td><input type="image" name="submit" img src="{{asset('images/trash.png')}}" alt="削除" onclick="return confirm('こちらの投稿を削除します。よろしいでしょうか？')" location.href="/post/{{$post->id}}/delete" ></input></td>
            </tr>
            @endforeach
@endsection
