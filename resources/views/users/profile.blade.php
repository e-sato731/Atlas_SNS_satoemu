@extends('layouts.login')

@section('content')

      <div class="form_input">
        <table>
          <tr>
              {{Form::label('user name')}}
                    {{Form::text('name', $user->username, ['class' => 'form-control', 'id' =>'username'])}}
                    <span class="text-danger">{{$errors->first('username')}}</span>
              {{Form::close()}}
          </tr>

          <tr>
              {{Form::label('mail','mail adress')}}
                    {{Form::text('mail', $user->mail, ['class' => 'form-control', 'id' =>'mail'])}}
                    <span class="text-danger">{{$errors->first('mail')}}</span>
               {{Form::close()}}
          </tr>

          <tr>
              <th>password</th>
              <th><input type="password" name="password" value="{{ old('password') }}" required></th>
          </tr>

          <tr>
              <th>password confirm</th>
              <th><input type="password" name="password-confirm" value="{{ old('password-confirm') }}"></th>
          </tr>

          <tr>
              {{Form::label('bio')}}
                    {{Form::text('mail', $user->bio, ['class' => 'form-control', 'id' =>'bio'])}}
                    <span class="text-danger">{{$errors->first('bio')}}</span>
               {{Form::close()}}
          </tr>

          <tr>
              <th>icon image</th>
              <th><form method="POST" action="/upload" enctype="multipart/form-data">
        @csrf
              <input type="file" name="image">
              </form><th>
          </tr>
</table>
</div>
        <div class="update-btn">
          <a href="/top" alt="更新">更新</a>
        </div>

@endsection
