@extends('layouts.app')

@section('content')
    
    @include('users.navtab')

@if (is_countable($followers) > 0)
    <ul class="list-unstyled">
        @foreach ($followers as $follower)
            <li class="media">
                @if($follower->profile_image)
                <img src="{{ $follower->profile_image }}"  width="60px" height="60px">
                @else
                <img class="mr-2 rounded" src="{{ Gravatar::get($follower->email, ['size' => 50]) }}" alt="">
                @endif
                <div class="media-body">
                    <div>
                        {{ $follower->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('users.show', 'プロフィールを見る', ['user' => $follower->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endif


@endsection