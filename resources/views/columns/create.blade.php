@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h1>新規作成</h1>

    <div class="row">
        <div class="col-6">
            <!-- model 第一引数：Modelのインスタンス、第二引数：連想配列　-->
            {!! Form::model($column, ['route' => 'columns.store']) !!}
        
                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    
                    {!! Form::label('content', '内容') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
        
                {!! Form::submit('作成', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection