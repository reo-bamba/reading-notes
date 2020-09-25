@extends('layouts.app')

@section('content')
    
    @include('users.navtab')

@if (is_countable($followers) > 0)
    <ul class="list-unstyled">
        @foreach ($followers as $follower)
            <li class="media">
                @if($follower->profile_image)
                <img src="/profile/{{ $follower->profile_image }}" width="200px" height="200px">
                @else
                <img class="mr-2 rounded" src="{{ Gravatar::get($follower->email, ['size' => 50]) }}" alt="">
                @endif
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('users.show', 'View profile', ['user' => $follower->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endif


@endsection