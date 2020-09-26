@extends('layouts.app')

@section('content')
    <h1>読書notes</h1>
    <br>
    <br>
     {{-- 通知メッセージ --}}
        @if (session()->has('message'))
        <div class="row">
            <div class="callout large success small-12">
                <h4>{{ session()->get('message') }}</h4>
            </div>
        </div>
        @endif
    @include('notes.notes')
    
   

@endsection