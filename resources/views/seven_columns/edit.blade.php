@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h3>id: {{ $seven_column->id }} の7コラム編集ページ</h3>

<div class="row">
    <div class="col-6">
        <!-- 'route' => ['messages.update', $message->id] というルーティング指定になります。
        配列の2つ目に $message->id を入れることで 
        update の URL である /messages/{message} の {message} に id が入ります
        -->
        {!! Form::model($seven_column, ['route' => ['seven_columns.update', $seven_column->id], 'method' => 'put']) !!}

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


        <div class="form-group">
            <label for="emotion-name">感情名</label>
            <input type="text" name="emotion_name" value="{{ $seven_column->emotion_name }}">
        
            <label for="emotion-strength">強さ</label>
            <input type="number" name="emotion_strength" value="{{ $seven_column->emotion_strength }}">
        </div>


        <div class="form-group">
            <label for=" thinking">その時考えたこと</label><br>
            <textarea name="thinking" cols="50" rows="5">{{ $seven_column->thinking }}</textarea>
            <!-- 内容必須バリデーション表示-->
            @if($errors->has('thinking'))
            @foreach($errors->get('thinking') as $message)
            <ul>
                <li class="ml-2 my-1 text-danger">{{ $message }}</li>
            </ul>
            @endforeach
            @endif
        </div>
        <!--
        <label>考え方の癖</label>
        <div class="wrap_thinking">
            
            <div><label class="habit-thinking"><input type="checkbox" name="habit[]">一般化のし過ぎ</label></div>
            <div><label class="habit-thinking"><input type="checkbox" name="check">自分への関連付け</label></div>
            <div><label class="habit-thinking"><input type="checkbox" name="check">根拠のない推論</label></div>
            <div><label class="habit-thinking"><input type="checkbox" name="check">白か黒か思考</label></div>
            <div><label class="habit-thinking"><input type="checkbox" name="check">すべき思考</label></div>
            <div><label class="habit-thinking"><input type="checkbox" name="check">過大評価と過少評価</label></div>
            <div><label class="habit-thinking"><input type="checkbox" name="check">感情による決めつけ</label></div>
        </div>
-->
        {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
</div>
</div>

@endsection