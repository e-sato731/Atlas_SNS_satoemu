@extends('layouts.login')

@section('content')
<div id="search">
  <form action="{{ route('users.search') }}" method="get">
    <input type="textarea" name="search" placeholder="ユーザー名"> <button id="search-btn"><i class="fas fa-search"></i></button>
  </div>

<!--name属性で定義したsearchをUsersControllerのinput()に代入-->

<p>検索ワード：{{$keyword}}</p>

<!--UsersControllerで定義した変数からデータを取り出して表示させる-->
@foreach($data as $data)
  @if ($data->id !== Auth::id())

<div>{{ $data -> username }}</div>
@endif

 <form action="{{ route('follows.follow') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $data->id }}">
            <button type="submit" class="btn btn-primary">
                @if ($data->is_followed)
                    フォロー解除
                @else
                    フォローする
                @endif
            </button>
        </form>
    @endforeach
@endsection
