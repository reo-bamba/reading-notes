@extends('layouts.app')

@section('content')
    
    @include('users.navtab')
    
    @if (is_countable($followings) > 0)
    <ul class="list-unstyled">
        @foreach ($followings as $following)
            <li class="media">
                @if($following->profile_image)
                <img src="/profile/{{ $following->profile_image }}" width="200px" height="200px">
                @else
                <img class="mr-2 rounded" src="{{ Gravatar::get($following->email, ['size' => 50]) }}" alt="">
                @endif
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('users.show', 'View profile', ['user' => $following->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    @endif

@endsection