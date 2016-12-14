@extends('app')

@section('title', '會員清單')

@section('content')
    <h2 class="ui teal header center aligned">
        會員清單
    </h2>
    {!! $dataTable->table(['class' => 'ui selectable celled padded table']) !!}
@endsection

@section('js')
    {!! $dataTable->scripts() !!}
@endsection
