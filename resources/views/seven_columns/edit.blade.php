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
    {!! Form::model($seven_column, 
          ['route' => ['seven_columns.update', $seven_column->id], 
          'method' => 'put']) 
    !!}

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
      {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 3]) !!}

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
      <input type="text" class="form-control" name="emotion_name" value="{{ $seven_column->emotion_name }}">

      <label for="emotion-strength">強さ</label>
      <input type="number" class="form-control" name="emotion_strength" value="{{ $seven_column->emotion_strength }}">
    </div>


    <div class="form-group">
      <label for="thinking">その時考えたこと</label><br>
      <textarea class="form-control" id="thinking" name="thinking" cols="50" rows="3">{{ $seven_column->thinking }}</textarea>
      <!-- 内容必須バリデーション表示-->
      @if($errors->has('thinking'))
      @foreach($errors->get('thinking') as $message)
      <ul>
        <li class="ml-2 my-1 text-danger">{{ $message }}</li>
      </ul>
      @endforeach
      @endif
    </div>

    <label for="basis_thinking">考えの根拠</label>
    <textarea class="form-control" id="basis_thinking" name="basis_thinking" cols="50" rows="3">{{ $seven_column->basis_thinking }}</textarea>

    <label for="opposite_fact">逆の事実</label>
    <textarea class="form-control" id="opposite_fact" name="opposite_fact" cols="50" rows="3">{{ $seven_column->opposite_fact }}</textarea>

    <label for="new_thinking">新しい考え</label>
    <textarea class="form-control" id="new_thinking" name="new_thinking" cols="50" rows="3">{{ $seven_column->new_thinking }}</textarea>

    <label for="new_emotion">新しい感情</label>
    <textarea class="form-control" id="new_emotion" name="new_emotion" cols="50" rows="3">{{ $seven_column->new_emotion }}</textarea>

    <button class="btn btn-primary btn-lg" onclick="history.back(-1)">戻る</button>

    {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
  </div>
</div>

@endsection