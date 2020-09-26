@extends('layouts.app')

@section('content')

@if(Auth::check())
<h2 class = "bg-success text-center">NOTEを編集</h2>
    <div class = "row">
        {!! Form::model($note, ['route' => ['notes.update', $note->id], 'enctype' => 'multipart/form-data', 'method' => 'put']) !!}
        <div class = "col-sm-6 offset-sm-6">
            <div class = "form-group">
                {!! Form::label('book_image', '＜本の画像を選択＞',) !!}
                {!! Form::file('book_image', old('book_image'), ['class' => 'field']) !!}
            </div>     

            <div class = "form group">
                {!! Form::label('title', '＜本のタイトルを入力＞', ['class' => 'control-label']) !!}
                {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}<br>
            </div>
            <div class = "form-group">
                {!! Form::label('rate', '＜評価点 : ') !!}
                {!! Form::selectRange('rate', 0, 100, old('rate'), ['class' => 'form-controll', 'range']) !!}＞
            </div>
            <div calss = "form-group">
                {!! Form::label('summary', '＜あらすじ＞') !!}
                {!! Form::textarea('summary', old('summary'), ['rows' =>7, 'cols' =>55]) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('thoughts', '＜感想＞') !!}
                {!! Form::textarea('thoughts', old('thoughts'), ['rows' =>7, 'cols' =>55]) !!}
            </div>
            <div class = "form-group">
            {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@else
    <div class="center jumbotron">
        <div class="text-center">
            <h2>ユーザー登録</h2>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endif

@endsection