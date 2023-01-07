@extends('layout.app')
@section('title', 'Login')
@section('link_text', 'Go to All Posts')
@section('link', '/post')
@section('login_text', 'Login')
@section('loginlink', '/login')
@section('logout_text', 'Go to All Posts')
@section('logoutlink', '/logout')
@section('profile_text', 'Profile')
@section('profileLink', '/Profile')
@section('logout_text', 'Logout')
@section('logoutLink', '/logout')

@section('content')

        <div class="container">
            <div class="row">
               <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Login</h4>
                <hr>
                <form action="{{route('login-user')}}" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Enter Email"
                        name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password"
                        name="password" value="">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Login</button>
                    </div>
                    <br>
                    <a href="registration">New User? Register here.</a>
                </form>
               </div> 
            </div>
        </div>
    
@endsection
    
