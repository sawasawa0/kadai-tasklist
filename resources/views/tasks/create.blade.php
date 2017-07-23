@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

    <h1>タスク新規作成ページ</h1>
    
    {!! Form::model($task, ['route' => 'tasks.store']) !!}
        {!! Form::label('status', 'ステータス:') !!}
        {!! Form::select('status',[
            '未着手' => '未着手',
            '実行中' => '実行中',
            '完了' => '完了',
        ]) !!}
    
        {!! Form::label('content','タスク：') !!}
        {!! Form::text('content') !!}
        
        {!! Form::submit('タスク作成') !!}
        
    {!! Form::close() !!}

@endsection