@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h3>出来事詳細ページ　id = {{ $event->id }} </h3>

<table class="table table-bordered">
  <tr>
    <th>作成日時</th>
    <th>最終変更日時</th>
    <th>出来事id</th>
    <th>タイトル</th>
    <th>内容</th>

  </tr>
  <tr>
    <td>{{ $event->created_at }}</td>
    <td>{{ $event->updated_at }}</td>
    <td>{{ $event->id }}</td>
    <td>{{ $event->title }}</td>
    <td>{{ $event->content }}</td>
  </tr>
  

</table>
<!--
<a href="{{ route('three_columns.create', $event->id) }}" 
      class="btn btn-success btn-lg" 
      role="button" 
      aria-pressed="true">この出来事を元に3コラムを作成
</a>
-->
{!! Form::model($event, ['route' => ['three_columns.create',$event->id], 'method' => 'post']) !!}
    <input type="hidden" name="event_id" value="{{ $event->id }}" >
    {!! Form::submit('この出来事を元に3コラムを作成', ['class' => 'btn-success btn-lg']) !!}
{!! Form::close() !!}


<!--配列の2つ目に $message->id を入れることで update の URL である /messages/{message} の {message} に id が入ります。-->


{!! Form::model($event, ['route' => ['events.edit',$event->id], 'method' => 'get']) !!}
    {!! Form::submit('編集', ['class' => 'btn btn-secondary  btn-lg']) !!}
{!! Form::close() !!}


{!! Form::model($event, ['route' => ['events.destroy', $event->id], 'method' => 'delete']) !!}
    {!! Form::submit('削除', ['class' => 'btn btn-danger  btn-lg']) !!}
{!! Form::close() !!}

<button class="btn btn-primary btn-lg" onclick="history.back(-1)">戻る</button>
@endsection