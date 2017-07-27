@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

    <h1>タスク一覧</h1>
    
    @if (count($tasks) > 0)
            
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ステータス</th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{!! link_to_route('tasks.show', $task->content, ['id' => $task->id]) !!}</td>
                </tr>
            @endforeach
            </tbody>
            
        </table>

@endif

    <div class="center jumbotron">
        <div class="text-center">
            <h2>TaskList</h2>
            {!! link_to_route('signup.get', '新規ユーザー登録!', null, ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>

    {!! link_to_route('tasks.create', '新規タスク', null, ['class' => 'btn btn-primary']) !!}

@endsection