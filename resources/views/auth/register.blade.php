@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class = "text-center">
            <h2>登録ページ</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            <form action = "{{ route('signup.post') }}" method = "POST" enctype="multipart/form-data">
                @csrf
            <h4>プロフィール画像を選択</h4>
                    <input type = "file" name = "profile_image">
                
            </form>
            {!! Form::open(['route' => 'signup.post']) !!}
                
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Sign up', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection