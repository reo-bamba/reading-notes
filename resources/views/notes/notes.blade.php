
@if(count($notes) > 0)
    <ul class = "list-unstyled">
        @foreach($notes as $note)
            <li class = "form-control-center">
                <div class = "row">
                <div class = "card" id ="wrapper">
                    <div class = "card-header" id ="header">
                    @if($note->user->profile_image)
                        <img src="/profile/{{ $note->user->profile_image }}" width="60px" height="60px">
                    @else
                        <img class="mr-2 rounded" src="{{ Gravatar::get($note->user->email, ['size' => 50]) }}" alt="">
                    @endif
                        <div class = "card-title">
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                            <h3>{!! link_to_route('users.show', $note->user->name, ['user' => $note->user->id]) !!}</h3>
                            <span class="text-muted"> 投稿 {{ $note->created_at }}</span>
                        </div>
                        @if(Auth::id() == $note->user_id)
                            {!! Form::open(['route' => ['notes.edit', $note->id], 'method' => 'get']) !!}
                               {!! Form::submit('編集', ['class' => 'btn btn-info btn-sm']) !!} 
                            {!! Form::close() !!}
                            
                            {!! Form::open(['route' => ['notes.destroy', $note->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除する', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                        
                    </div>
                <div class = "card-body" id = "main">
                    <img src = "/uproads/{{ $note->book_image }}" alt = "non image" width="150px" height="150px">
                    {{-- title, image, rate, Like --}}
                    <div id = "main1">
                        <h3>タイトル : {!! link_to_route('notes.show', $note->title, ['note' => $note->id]) !!}</h3>
                        <h3>評価点 : {{ $note->rate }}</h3>
                        {{-- Like button --}}
                        @include('notes.like_button')
                    </div>
                </div>
                </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{ $notes->links() }}
@endif