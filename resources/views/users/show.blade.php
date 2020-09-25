@extends('layouts.app')

@section('content')
    {{-- profile --}}
    @include('users.navtab')
    
    {{-- 投稿一覧 --}}
    @include('notes.display')

    
@endsection