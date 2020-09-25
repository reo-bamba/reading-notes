@if(Auth::user()->is_like($note->id)) 
  
    {!! Form::open(['route' => ['likes.unlike', $note->id],'method' => 'DELETE']) !!}
        {!! Form::submit('Unlike', ['class' => "btn btn-light btn-sm "]) !!}
    {!! Form::close() !!}
@else
     {{-- likeボタンのフォーム --}}
    {!! Form::open(['route' => ['likes.like', $note->id]]) !!}
        {!! Form::submit('Like', ['class' => "btn btn-warning btn-sm "]) !!}
    {!! Form::close() !!}
@endif 