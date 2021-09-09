@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h1>7コラム詳細ページ（id = {{ $seven_column->id }} ）</h1>

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
        <th class="habit">id</th>
        <td>{{ $seven_column->id }}</td>
    </tr>
    <tr>
        <th class="habit">ユーザーID</th>
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
        <th>逆の事実</th></th>
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

    <tr>
        <th>考え方の癖</th>
        <td>
            <div class="columns">
                <label class="habit-thinking"><input type="checkbox" name="check">一般化のし過ぎ</label>
                <label class="habit-thinking"><input type="checkbox" name="check">自分への関連付け</label>
                <label class="habit-thinking"><input type="checkbox" name="check">根拠のない推論</label>
                <label class="habit-thinking"><input type="checkbox" name="check">白か黒か思考</label>
                <label class="habit-thinking"><input type="checkbox" name="check">すべき思考</label>
                <label class="habit-thinking"><input type="checkbox" name="check">過大評価と過少評価</label>
                <label class="habit-thinking"><input type="checkbox" name="check">感情による決めつけ</label>
            </div>
        </td>
    </tr>
</table>
<p><a href = "{{ route('seven_columns.edit', $seven_column->id) }}">{{ $seven_column->id }}を編集する</a></p>


    <div style="margin:20px;">
        {!! Form::model($seven_column, ['route' => ['seven_columns.edit', $seven_column->id], 'method' => 'get']) !!}
            {!! Form::submit('編集', ['class' => 'btn btn-secondary']) !!}
        {!! Form::close() !!}
    </div>

    <div style="margin:20px;">
        {!! Form::model($seven_column, ['route' => ['seven_columns.destroy', $seven_column->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>

@endsection