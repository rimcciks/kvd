@extends('layout.app')
@section('title', 'Profile')
@section('link_text', 'Go to All Posts')
@section('link', '/post')


@section('content')
        <div class="container">
            <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-8">
                        <h4>{{$results[0]->name}} {{$results[0]->surname}}</h4>
                        <small><cite title="San Francisco, USA">{{$results[0]->city}} {{$results[0]->country_name}}<i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>{{$results[0]->email}}
                            <br />
                            @if($results[0]->gender == 'M')
                            <i class="glyphicon glyphicon-globe"></i>Male
                            @endif
                            @if($results[0]->gender == 'F')
                            <i class="glyphicon glyphicon-globe"></i>Female
                            @endif
                            @if($results[0]->gender == 'O')
                            <i class="glyphicon glyphicon-globe"></i>Other
                            @endif
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>{{$results[0]->adressLine}}</p>
                        <a href="/editProfile" class="btn btn-primary rounded-pill">Edit profile</a>
                    </div>
                </div>
            </div>
        </div>
               
            </div>
        </div>
@endsection
