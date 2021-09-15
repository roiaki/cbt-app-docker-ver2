@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h3>id: {{ $event->id }}　出来事　編集ページ</h3>

<div class="row">
    <div class="col-6">
        <!-- 'route' => ['messages.update', $message->event_id] というルーティング指定になります。
        配列の2つ目に $message->event_id を入れることで 
        update の URL である /messages/{message} の {message} に event_id が入ります
        -->
        
        {!! Form::model($event, ['route' => ['events.update', $event->id], 'method' => 'put']) !!}
        <div class="form-group">
            <!-- タイトル -->
            {!! Form::label('title', 'タイトル') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}

            <!-- タイトル必須バリデーション表示 課題：まとめてかけないか-->
            @if($errors->has('title'))
                @foreach($errors->get('title') as $message)
                <ul>
                    <li class="ml-2 my-1 text-danger">{{ $message }}</li>
                </ul>
                @endforeach
            @endif
        </div>

        <div class="form-group">
            <!-- 内容 -->
            {!! Form::label('content', '内容') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control']) !!}

            <!-- 内容必須バリデーション表示-->
            @if($errors->has('content'))
                @foreach($errors->get('content') as $message)
                <ul>
                    <li class="ml-2 my-1 text-danger">{{ $message }}</li>
                </ul>
                @endforeach
            @endif
        </div>

        {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>

@endsection