@extends('layouts.app')

@section('content')

<div class = "card">
    <div class = "card-header" id = "header">
        @if($note->user->profile_image)
            <img src="/profile/{{ $note->user->profile_image }}" width="60px" height="60px">
        @else
            <img class="mr-2 rounded" src="{{ Gravatar::get($note->user->email, ['size' => 50]) }}" alt="">
        @endif
            
            {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                <h3>{!! link_to_route('users.show', $note->user->name, ['user' => $note->user->id]) !!}</h3>
                    <span class="text-muted">posted at {{ $note->created_at }}</span>
            
        @if (Auth::id() == $note->user_id)
            {!! Form::open(['route' => ['notes.destroy', $note->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除する', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}
        @endif
    </div>
</div>
<div id="container">
<div class = "row">
    <div class = "card col-sm-4 col-md-4">
        <h2 class = "card-header">{{ $note->title }}</h2>
        <img  src = "/uproads/{{ $note->book_image }}" alt = "non image" style ="width: 18rem; height: 250px;">
    </div>
</div>
<div class = "row">
    <h3 id ="title2">評価点 : {{ $note->rate }}</h3>
    <div class="card text-center border-info  mb-3" style="max-width: 40rem;">
        <div class = "card-header">あらすじ</div>
        <p class = "card-text">{{ $note->summary }}</p>
    </div>
    
    <div class="card text-center border-info  mb-3" style="max-width: 40rem;">
        <div class = "card-header">感想</div>
        <p class = "card-text">{{ $note->thoughts }}</p>
    </div>
</div>
</div>
@endsection