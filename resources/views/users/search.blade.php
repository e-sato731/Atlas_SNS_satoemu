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
<div>{{ $data -> username }}</div>


 <div class="follow-contents">
@if(Auth::user() != $data)
  <form action="{{ route('unfollow', ['user' => $data->id]) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</div>

<!--フォロー、フォロー解除ボタン-->
<button type="submit" class="btn btn-danger">フォロー解除</button>
</form>

@else

<button type="submit" class="btn btn-primary">フォローする</button>
</form>

</div>

@endif
@endforeach
@endsection
