@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h1>イベント詳細ページ　id = {{ $event->id }} </h1>

{!! Form::open(['route' => ['three_columns.create', $event->id], 'method'=> 'get']) !!}
<table class="table table-bordered">
    <tr>
        <th>作成日時</th>
        <td>{{ $event->created_at }}</td>
    </tr>
    <tr>
        <th>最終変更日時</th>
        <td>{{ $event->updated_at }}</td>
    </tr>
    <tr>
        <th class="habit">id</th>
        <td><input type="text" name="event_id" value="{{ $event->id }}" readonly></td>
    </tr>
    <tr>
        <th class="habit">ユーザーID</th>
        <td><input type="text" name="user_id" value="{{ $event->user_id }}" readonly></td>
    </tr>

    <tr>
        <th>タイトル</th>
        <td><input type="text" name="title" value="{{ $event->title }}" readonly></td>

    </tr>
    <tr>
        <th>内容</th>
        <td><input type="text" name="content" value="{{ $event->content }}" readonly></td>
    </tr>

</table>
{!! Form::submit('3コラム作成', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

<p><a href="{{ route('events.edit', $event->id) }}">{{ $event->id }}を編集する</a></p>

<div style="margin:20px;">

    <!--配列の2つ目に $message->id を入れることで update の URL である /messages/{message} の {message} に id が入ります。-->

    {!! Form::open(['route' => ['three_columns.create', $event->id], 'method'=> 'get']) !!}
    {!! Form::submit('3コラム作成', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
<div style="margin:20px;">
    {!! Form::model($event, ['route' => ['events.edit', $event->id], 'method' => 'get']) !!}
    {!! Form::submit('編集', ['class' => 'btn btn-secondary']) !!}
    {!! Form::close() !!}
</div>

<div style="margin:20px;">
    {!! Form::model($event, ['route' => ['events.destroy', $event->id], 'method' => 'delete']) !!}
    {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
</div>

@endsection