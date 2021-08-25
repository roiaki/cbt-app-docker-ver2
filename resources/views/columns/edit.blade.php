@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h1>id: {{ $column->id }} の編集ページ</h1>

<div class="row">
    <div class="col-6">
        {!! Form::model($column, ['route' => ['columns.update', $column->id], 'method' => 'put']) !!}
    
            <div class="form-group">
                {!! Form::label('title', 'タイトル:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}

                {!! Form::label('content', '内容:') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>
    
            {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
    
        {!! Form::close() !!}
    </div>
</div>

@endsection