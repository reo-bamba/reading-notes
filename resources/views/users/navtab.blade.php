<div class = "row">
        <aside class = "col-sm-10">
            <div class = "card" style = "width: 100%">
                <div class = "card-header">
                    <h2>プロフィール</h2>
                </div>
                <div class = "card-body" id ="header">
                    <img src = "{{ $user->profile_image }}" alt = "non image" width="160px" height="160px">
                    <h2 class = "card-title">{{ $user->name }}</h2>
                </div>
            </div>  
            @include('user_follow.follow_button')
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-4">
                {{-- ユーザ詳細タブ --}}
                <li class="nav-item">
                    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
                        投稿
                        <span class="badge badge-secondary">{{ $user->notes_count }}</span>
                    </a>
                </li>
                {{-- フォロー一覧タブ --}}
                <li class="nav-item">
                    <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
                        フォロー中
                        <span class="badge badge-secondary">{{ $user->followings_count }}</span>
                    </a>
                </li>
                {{-- フォロワー一覧タブ --}}
                <li class="nav-item">
                    <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
                        フォロワー
                        <span class="badge badge-secondary">{{ $user->followers_count }}</span>
                    </a>
                </li>
                {{-- Likes --}}
                <li class="nav-item">
                    <a href="{{ route('users.likes', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.likes') ? 'active' : '' }}">
                        Likes
                        <span class="badge badge-secondary">{{ $user->likes_count }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>