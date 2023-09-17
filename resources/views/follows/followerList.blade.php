@extends('layouts.login')

@section('content')
<div class="profile-content">
</div>

<hi>Follower List</hi>
<form action='follows.followers' method="GET"></form>


@foreach ($followed_id as $followed_id)
<ul>
  <li>
     <img src="{{ asset('storage/images'.$followed_id -> images) }}"  alt="アイコン">
 </li>
     @endforeach

</ul>
@endsection
