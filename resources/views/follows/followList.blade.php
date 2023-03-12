@extends('layouts.login')

@section('content')
<div class="profile-content">
	<follow-list user_id="{{$user->id}}" login_user_id="{{Auth::id()}}" csrf="{{json_encode(csrf_token())}}"></follow-list>
</div>

<hi>Follow List</hi>
<form action='/follow-List' method="GET"></form>

@foreach($following_users as $following_users)
<tr>
  <td><img src="{{asset('storage/' .$data ->user ->images)}}" alt=""></td>
  <td>{{$data -> user -> username}}</td>
</tr>

@endforeach

@endsection
