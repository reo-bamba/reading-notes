<header class = "mb-4">
    <div class = "navbar navbar-expand-sm navbar-dark bg-info">
        {{-- to top page --}}
        <a class = "navbar-brand" href = "/">読書notes</a>
        
        <button type = "button" class = "navbar-toggler" data-toggle = "collapse" data-target="#nav-bar">
            <span class = "navbar-toggler-icon"></span>
        </button>
        
        <div class = "collapse navbar-collapse" id = "nav-bar">
            <ul class = "navbar-nav">
                {{-- ユーザー登録 --}}
                <li>{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                
                {{-- ユーザーログイン --}}
                <li>ログイン</li>
                
            </ul>
        </div>
    </div>
</header>