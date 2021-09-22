@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h1>３コラム詳細ページ　id = {{ $three_column->id }} </h1>
<p>ユーザーID:{{ $user->id }}<br>
イベントID：{{ $three_column->id }}<br>
3コラムID：{{ $three_column->id}}</p>

<table class="table table-bordered">
    <tr>
        <th>作成日時</th>
        <td>{{ $three_column->created_at }}</td>
        <th>最終変更日時</th>
        <td>{{ $three_column->updated_at }}</td>
    </tr>

    <tr>
        <th>イベントID</th>
        <td>{{ $three_column->id }}</td>
        <th>3コラムID</th>
        <td>{{ $three_column->id }}</td>
        <th>ユーザーID</th>
        <td>{{ $user->id }}</td>
    </tr>

</table>

<table class="table table-bordered">
    <tr>
        <th>タイトル</th>
        <td>{{ $three_column->title }}</td>
        <th>内容</th>
        <td>{{ $three_column->content }}</td>
    </tr>
</table>

<table class="table table-bordered">
    <tr>
        <th class="three">感情と強さ</th>
        <td>{{ $three_column->emotion_name }}</td>
        <td>{{ $three_column->id }}</td>
    </tr>

    <tr>
        <th>その時考えた事</th>
        <td>{{ $three_column->thinking }}</td>
    </tr>


    <tr>
        <th>考え方の癖</th>
        <td>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="habit[0]" id="1">
                    <label class="form-check-label" for="1">
                        一般化のし過ぎ
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="habit[1]" id="2">
                    <label class="form-check-label" for="2">
                        自分への関連付け
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="habit[2]" id="3">
                    <label class="form-check-label" for="3">
                        根拠のない推論
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="habit[3]" id="4">
                    <label class="form-check-label" for="4">
                        白か黒か思考
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="habit[4]" id="5">
                    <label class="form-check-label" for="5">
                        すべき思考
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="habit[5]" id="6">
                    <label class="form-check-label" for="6">
                        過大評価と過少評価
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="habit[6]" id="7">
                    <label class="form-check-label" for="7">
                        感情による決めつけ
                    </label>
                </div>
            </div>
        </td>

    </tr>
</table>
<a class="navbar-brand fw-bold ml-5" href="/three_columns">戻る</a>
    <!--配列の2つ目に $message->id を入れることで update の URL である /messages/{message} の {message} に id が入ります。-->

</div>
  
</div>

@endsection