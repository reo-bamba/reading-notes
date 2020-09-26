@if(Auth::check())
    @if(Auth::user()->is_like($note->id))

        {!! Form::open(['route' => ['likes.unlike', $note->id], 'method' => 'DELETE']) !!}
            {!! Form::submit('Unlike', ['class' => 'btn btn-light btn-lg']) !!}
        {!! Form::close() !!}
    @else

        {!! Form::open(['route' => ['likes.like', $note->id]]) !!}
            {!! Form::submit('Like!', ['class' => 'btn btn-warning btn-lg']) !!}
        {!! Form::close() !!}
    @endif
@endif