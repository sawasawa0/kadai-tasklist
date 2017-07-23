@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h1>id: {{ $task->id }} のタスク編集ページ</h1>

    {!! Form::model($task, ['route' => ['tasks.update',$task->id],'method' => 'put']) !!}
   
        {!! Form::label('status', 'ステータス:') !!}
        {!! Form::select('status',[
            '未着手' => '未着手',
            '実行中' => '実行中',
            '完了' => '完了',
        ]) !!}
    
        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content') !!}
        
        {!! Form::submit('更新') !!}
        
    {!! Form::close() !!}

@endsection