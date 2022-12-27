@extends('layouts.master')

@section('title')
Welcome!
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign UP</h3>
            <form action="{{ route('signUp') }}" method="post">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="text" name="email" id="email" placeholder="Enter your e-mail">
                </div>
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" placeholder="Enter your first name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Enter your last name">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Enter password">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="{{ route('signIn') }}" method="post">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="text" name="email" id="email" placeholder="Enter your e-mail">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Enter password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection
