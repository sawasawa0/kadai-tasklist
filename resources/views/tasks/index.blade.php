@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h1>タスク一覧</h1>

@if (count($tasks) > 0)

    <ul> 
        @foreach ($tasks as $task)
            <li>{{ $task->status }} : {!! link_to_route('tasks.show', $task->content, ['id' => $task->id]) !!} </li>

        @endforeach
    </ul>


@endif

@endsection