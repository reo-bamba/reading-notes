@extends('layouts.app')

@section('content')

    @include('users.navtab')
    
    <div class = "col-sm-8">
        @include('notes.notes', ['notes' => $likes])
    </div>
    
@endsection