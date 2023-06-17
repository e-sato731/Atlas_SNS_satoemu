@extends('layouts.login')

@section('content')
<div class="profile-content">
</div>

<hi>Follower List</hi>
<form action='follows.followerList' method="GET"></form>

<ul>
@foreach ($followed_id as $followed_id)
 <li>
     <img src="{{ $followed_id -> icon }}"  alt="アイコン">
    <span>{{ $followed_id -> username }}</span>
   <ul>
      @foreach ($posts->where('user_id', $followed_id -> followed_id) as $posts)
     <li>{{ $posts -> post }}</li>
     @endforeach
    </ul>
  </li>
@endforeach

</ul>
@endsection
