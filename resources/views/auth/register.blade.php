@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class = "text-center">
            <h2>登録ページ</h2>
        </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(['route' => 'signup.post', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::label('profile_image', 'プロフィール画像を選択') !!}<br>
                    {!! Form::file('profile_image', ['class' => 'field']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'お名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード確認') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Sign up', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    </div>
@endsection