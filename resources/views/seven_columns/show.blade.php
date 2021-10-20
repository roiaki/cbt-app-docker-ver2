@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h3>7コラム詳細ページ id = {{ $seven_column->id }} </h3>

<table class="table table-bordered">
  <tr>
    <th>作成日時</th>
    <td>{{ $seven_column->created_at }}</td>
  </tr>
  <tr>
    <th>最終変更日時</th>
    <td>{{ $seven_column->updated_at }}</td>
  </tr>
  <tr>
    <th>id</th>
    <td>{{ $seven_column->id }}</td>
  </tr>
  <tr>
    <th>出来事ID</th>
    <td>{{ $seven_column->event_id }}</td>
  </tr>
  <tr>
    <th>3コラムID</th>
    <td>{{ $seven_column->threecol_id }}</td>
  </tr>
  <tr>
    <th>ユーザーID</th>
    <td>{{ $seven_column->user_id }}</td>
  </tr>
</table>

<table class="table table-bordered">
  <tr>
    <th>タイトル</th>
    <td>{{ $seven_column->title }}</td>
  </tr>
  <tr>
    <th>内容</th>
    <td>{{ $seven_column->content }}</td>
  </tr>
</table>

<table class="table table-bordered">
  <tr>
    <th class="three">感情と強さ</th>
    <td>{{ $seven_column->emotion_name }}</td>
    <td>{{ $seven_column->emotion_strength }}</td>
  </tr>

  <tr>
    <th>その時考えた事</th>
    <td>{{ $seven_column->thinking }}</td>
  </tr>

  <tr>
    <th>根拠</th>
    <td>{{ $seven_column->basis_thinking }}</td>
  </tr>

  <tr>
    <th>逆の事実</th>
    </th>
    <td>{{ $seven_column->opposite_fact }}</td>
  </tr>

  <tr>
    <th>新しい考え</th>
    <td>{{ $seven_column->new_thinking }}</td>
  </tr>

  <tr>
    <th>新しい感情</th>
    <td>{{ $seven_column->new_emotion }}</td>
  </tr>
</table>
<p><a href="{{ route('seven_columns.edit', $seven_column->id) }}">{{ $seven_column->id }}を編集する</a></p>
<button class="btn btn-primary btn-lg" onclick="history.back(-1)">戻る</button>

<div style="margin:20px;">
  {!! Form::model($seven_column, ['route' => ['seven_columns.edit', $seven_column->id], 'method' => 'get']) !!}
  {!! Form::submit('編集', ['class' => 'btn btn-secondary']) !!}
  {!! Form::close() !!}
</div>


  {!! Form::model($seven_column, ['route' => ['seven_columns.destroy', $seven_column->id], 'method' => 'delete']) !!}
  {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
  {!! Form::close() !!}
</div>

@endsection