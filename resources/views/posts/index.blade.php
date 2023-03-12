<!--bladeは画面に表示する-->
<?php

// 書き込み日時を取得
$current_date = date("Y-m-d H:i:s");

?>

@extends('layouts.login')

@section('content')

<!-- つぶやきを投稿する -->
{!! Form::open(['url' => '/create']) !!}
     <div class="form-group">
         {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
     </div>
     <input type="image" name="submit" img src="{{asset('images/post.png')}}" alt="送信"></input>
 {!! Form::close() !!}

@foreach ($post as $post)

<div class="form-group">
<tr>
    <td>{{ $post->post }}</td>
    <td>{{ $post->created_at }}</td>
</tr>

<!-- つぶやきを編集する -->
 <!--ウィンドウを開く -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  <img src="{{asset('images/edit.png')}}">
</button>

<!-- モーダルの設定 -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>

          <div class="modal-body">
             {!! Form::open(['url' => '/posts/{id}/update']) !!}
            <div class="form-group">
                {!! Form::hidden('id', $post->id) !!}
                {!! Form::input('text', 'upPost', $post->post, ['required', 'class' => 'form-control']) !!}
            </div>
          </div>

          <div class="modal-footer">
            <a href="/posts/{{$post->id}}/update"><img src="{{asset('images/edit.png')}}" data-toggle="upPost" data-target="#modal-footer" alt="更新"></a></td>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>

<!-- つぶやきを削除する -->
<td>
    <a href="/posts/{{$post->id}}/delete"><img src="{{asset('images/trash.png')}}"  onclick="return confirm('こちらの投稿を削除します。よろしいでしょうか？')" alt="削除"></a>
</td>
</div>
            @endforeach
@endsection
