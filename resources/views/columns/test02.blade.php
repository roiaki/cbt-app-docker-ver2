@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h1>test02詳細ページ　id = {{ $column->id }} </h1>
<!--<form metod="POST" action="{{ route('seven_columns.create') }}">-->
{!! Form::model($column, ['route' => ['seven_columns.create', $column->id] , 'method' => 'GET']) !!}
<table class="table table-bordered">
    <tr>
        <th>作成日時</th>
        <td>{{ $column->created_at }}</td>
    </tr>
    <tr>
        <th>最終変更日時</th>
        <td>{{ $column->updated_at }}</td>
    </tr>
    <tr>
        <th class="habit">id</th>
        <td>{{ $column->id }}</td>
    </tr>
    <tr>
        <th class="habit">ユーザーID</th>
        <td>{{ $column->user_id }}</td>
    </tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>タイトル</th>
        <td>{{ $column->title }}</td>

    </tr>
    <tr>
        <th>内容</th>
        <td>{{ $column->content }}</td>
    </tr>
</table>

<table class="table table-bordered">
    <tr>
        <th class="three">感情と強さ</th>
        <td>{{ $column->emotion_name }}</td>
        <td>{{ $column->emotion_strength }}</td>
    </tr>

    <tr>
        <th>その時考えた事</th>
        <td>{{ $column->thoughts }}</td>
    </tr>

</table>
    <button class=""type="submit">
        この思考を修正する
    </button>
{!! Form::close() !!}
<p><a href="{{ route('columns.edit', $column->id) }}">{{ $column->id }}を編集する</a></p>
<p><a href="{{ route('seven_columns.edit', $column->id) }}">{{ $column->id }}を7編集する</a></p>

<div style="margin:20px;">
    {!! Form::model($column, ['route' => ['columns.create', $column->id], 'method' => 'get']) !!}
    {!! Form::submit('テス', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
<div style="margin:20px;">
    {!! Form::model($column, ['route' => ['columns.edit', $column->id], 'method' => 'get']) !!}
    {!! Form::submit('編集', ['class' => 'btn btn-secondary']) !!}
    {!! Form::close() !!}
</div>

<div style="margin:20px;">
    {!! Form::model($column, ['route' => ['columns.destroy', $column->id], 'method' => 'delete']) !!}
    {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
</div>

@endsection