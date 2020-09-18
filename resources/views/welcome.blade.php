@extends('layouts.app')

@section('content')
@if (Auth::check())
        {{ Auth::user()->name }}
@else
    <h1>読書notes</h1>
    <br>
    <br>
    {!! link_to_route('signup.get', '新規登録！', [], ['class' => 'btn btn-lg btn-primary']) !!}
@endif
@endsection