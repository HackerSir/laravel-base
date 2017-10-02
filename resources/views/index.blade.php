@extends('layouts.app')

@section('title', '首頁')

@section('css')
    <style>
        .jumbotron {
            word-break: break-all;
            margin-bottom: 0;
            border-radius: 20px;
            padding-top: 48px;
            padding-bottom: 48px;
        }
    </style>
@endsection
@section('content')
    <div class="jumbotron mt-3">
        <h1>{{ config('app.name') }}</h1>
        <h3>逢甲大學黑客社</h3>
        <a href="javascript:void(0)" class="btn btn-primary btn-lg" title="Let's GO!!">GO!</a>
    </div>
@endsection
