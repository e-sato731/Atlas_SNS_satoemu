@extends('layouts.login')

@section('content')
<div class="profile-content">
</div>

<hi>Follow List</hi>
<form action='follows.followList' method="GET"></form>

<ul>
@foreach ($following_id as $followings)
 <li>
     <button><img src="{{ asset('storage/'. $followings -> images) }}"  alt="アイコン"></button>
  </li>
@endforeach

</ul>
@endsection
