@extends('layouts.login')

@section('content')
<div id="search">
  <form action="{{ route('users.search') }}" method="get">
    <input type="textarea" name="search" placeholder="ユーザー名"> <button id="search-btn"><i class="fas fa-search"></i></button>
  </div>

<!--name属性で定義したsearchをUsersControllerのinput()に代入-->

<p>検索ワード：{{$keyword}}</p>

<!--UsersControllerで定義した変数からデータを取り出して表示させる-->
@foreach($data as $datas)
      @if ($datas->id !== Auth::id())
      <div>{{ $datas -> username }}</div>

        @if (Auth::user()->isFollowing($datas))
<!--フォロー解除-->
        <form action="{{ route('follows.unfollow', $datas->id) }}" method="POST">
          <!--$datasの中からユーザーidを取り出す-->
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">フォロー解除</button>
</form>
    @else
<!--フォローする-->
        <form action="{{ route('follows.follow', ['id' => $datas->id]) }}" method="POST">
          <!--$datasの中からユーザーidを取り出す-->
            @csrf
            <button type="submit" class="btn btn-primary">フォローする</button>
        </form>
 @endif
 @endif
@endforeach
@endsection
