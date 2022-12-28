@extends('layout.app')
@section('title', 'Dashboard')
@section('link_text', 'Go to All Posts')
@section('link', '/post')


@section('content')
        <div class="container">
            <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-8">
                        <h4>{{$data->name}} {{$data->surname}}</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>{{$data->email}}
                            <br />
                            <i class="glyphicon glyphicon-globe"></i>Gender
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>Adress line</p>
                        <a href="editProfile" class="btn btn-primary rounded-pill">Edit profile</a>
                    </div>
                </div>
            </div>
        </div>
               
            </div>
        </div>
@endsection
