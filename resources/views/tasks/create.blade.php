@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

    <h1>タスク新規作成ページ</h1>
    
    {!! Form::model($task, ['route' => 'tasks.store']) !!}
        {!! Form::label('content','タスクを入力：') !!}
        {!! Form::text('content') !!}
        
        {!! Form::submit('タスク作成') !!}
        
    {!! Form::close() !!}

@endsection