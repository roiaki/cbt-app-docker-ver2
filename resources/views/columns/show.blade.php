@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h1>id = {{ $column->id }} の詳細ページ</h1>

<table class="table table-bordered">
    <tr>
        <th>id</th>
        <td>{{ $column->id }}</td>
    </tr>
    <tr>
        <th>タイトル</th>
        <td>{{ $column->title }}</td>
        
    </tr>
    <tr>
        <th>内容</th>
        <td>{{ $column->content }}</td>
    </tr>
</table>
<p><a href = "{{ route('columns.edit', $column->id) }}">{{ $column->id }}を編集する</a></p>

<div class="d-flex flex-row">
    <div class="col-xs-3 ml-3">
    {!! Form::model($column, ['route' => ['columns.edit', $column->id], 'method' => 'get']) !!}
        {!! Form::submit('編集', ['class' => 'btn btn-secondary']) !!}
    {!! Form::close() !!}
    </div>
    <div class="col-xs-3 ml-5">
    {!! Form::model($column, ['route' => ['columns.destroy', $column->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    </div>
</div>
@endsection