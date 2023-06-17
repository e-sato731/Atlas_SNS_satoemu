@extends('layouts.login')

@section('content')
<div class="profile-content">
</div>

<hi>Follow List</hi>
<form action='follows.followList' method="GET"></form>

<ul>
@foreach ($following_id as $following_id)
 <li>
     <img src="{{ asset('storage/'.$following_id -> icon) }}"  alt="アイコン">
    <span>{{ $following_id -> username }}</span>
   <ul>
      @foreach ($posts->where('user_id', $following_id -> following_id) as $posts)
     <li>{{ $posts -> post }}</li>
     @endforeach
    </ul>
  </li>
@endforeach

</ul>
@endsection
