@extends('layouts.login')

@section('content')
<div id="search">
  <form action="User.php" method="post">
    <input type="textarea" name="search" placeholder="ユーザー名"> <button id="search-btn"><i class="fas fa-search"></i></button>

@endsection
