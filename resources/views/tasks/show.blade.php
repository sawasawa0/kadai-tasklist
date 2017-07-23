@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<h1>id = {{ $task->id }} のメッセージ詳細ページ</h1>

<p>{{ $task->content }}</p>

@endsection