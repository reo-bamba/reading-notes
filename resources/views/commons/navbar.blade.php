<header class = "mb-4">
    <div class = "navbar navbar-expand-sm navbar-dark bg-info">
        {{-- to top page --}}
        <a class = "navbar-brand" href = "/">読書notes</a>
        
        <button type = "button" class = "navbar-toggler" data-toggle = "collapse" data-target="#nav-bar">
            <span class = "navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if(Auth::check())
                {{-- 投稿ボタン --}}
                    <li class="nav-item">{!! link_to_route('notes.create', '投稿する', [], ['class' => 'nav-link']) !!}</li>
                 
                {{-- ユーザ一覧ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('users.index', 'ユーザー一覧', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}さんでログイン中</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- ユーザ詳細ページへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.show', 'My profile', ['user' => Auth::id()]) !!}</li>
                            <li class="dropdown-divider"></li>
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>

                @else
                {{-- ユーザー登録 --}}
                <li>{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                
                {{-- ユーザーログイン --}}
                <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </div>
</header>