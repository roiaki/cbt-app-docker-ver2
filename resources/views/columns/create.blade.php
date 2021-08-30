@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<!--
    @if (count($errors) > 0)
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li class="ml-4">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
-->

<h3>新規作成</h3>

<div class="row">
    <div class="col-6">
        <!-- model 第一引数：Modelのインスタンス、第二引数：連想配列　-->
        {!! Form::model($column, ['route' => 'columns.store']) !!}

        <div class="form-group">
            <!-- タイトル -->
            {!! Form::label('title', 'タイトル') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}

            <!-- タイトル必須バリデーション表示-->
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

        <div>
            <div>
                <label for="emotion-name">感情名</label>
                <input type="text" name="emotion_name">
            </div>
            <div>
                <label for="emotion-strength">強さ</label>
                <input type="number" name="emotion_strength">
            </div>
        </div>

        <div>
            <label for=" thoughts">その時考えたこと</label><br>
            <textarea name="thoughts" cols="50" rows="7"></textarea>
        </div>

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
        {!! Form::submit('作成', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection