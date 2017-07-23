@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

    <h1>id: {{ $task->id }} のタスク編集ページ</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                {!! Form::model($task, ['route' => ['tasks.update',$task->id],'method' => 'put']) !!}
                
                <div class="form-group">   
                    {!! Form::label('status', 'ステータス:') !!}
                    
                    <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-3">
                        {!! Form::select('status',[
                        '未着手' => '未着手',
                        '実行中' => '実行中',
                        '完了' => '完了',
                        ], 
                        ['class' => 'form-control']
                        ) !!}
                    </div>
                </div>
                
                <div class="form-group">   
                    {!! Form::label('content', 'タスク:') !!}
    
                    <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-3">
                        {!! Form::text('content', null, ['class' => 'form-control']) !!}
                    </div>
    
                </div>
                
                {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}
                
                {!! Form::close() !!}
            </div>
        </div>   
@endsection