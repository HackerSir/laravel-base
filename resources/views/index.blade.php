@extends('app')

@section('title', '首頁')

@section('css')
    <style>
        .jumbotron {
            text-align: center;
            background: rgba(100, 100, 100, .6);
            margin-top: 20vh;
            padding-top: 40px;
            border-radius: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="jumbotron">
        <div class="ui translucent vertical center aligned segment">
            <h1 class="ui inverted center aligned icon header">
                <i class="circular inverted red massive marker icon"></i>
                {{ config('site.name') }}
                <p class="ui sub header">
                    逢甲大學黑客社
                </p>
            </h1>
            <a href="javascript:void(0)" class="ui large inverted red center aligned button" style="margin-top: 5vh;">GO!</a>
        </div>
    </div>
@endsection
