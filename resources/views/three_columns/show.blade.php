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

{{var_dump($habit_id);}}
    <tr>
        <th>考え方の癖</th>
        <td>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="habit[0]" id="1"
                        <?php if (in_array(1, $habit_id) ) { echo 'checked'; } ?> >
                    <label class="form-check-label" for="1">
                        一般化のし過ぎ
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="habit[0]" id="1"
                        <?php if (in_array(2, $habit_id) ) { echo 'checked'; } ?> >
                    <label class="form-check-label" for="1">
                        自分への関連付け
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="habit[0]" id="1"
                        <?php if (in_array(3, $habit_id) ) { echo 'checked'; } ?> >
                    <label class="form-check-label" for="1">
                        根拠のない推論
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="habit[0]" id="1"
                        <?php if (in_array(4, $habit_id) ) { echo 'checked'; } ?> >
                    <label class="form-check-label" for="1">
                        白か黒か思考
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="habit[0]" id="1"
                        <?php if (in_array(5, $habit_id) ) { echo 'checked'; } ?> >
                    <label class="form-check-label" for="1">
                        すべき思考
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="habit[0]" id="1"
                        <?php if (in_array(6, $habit_id) ) { echo 'checked'; } ?> >
                    <label class="form-check-label" for="1">
                        過大評価と過少評価
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="habit[0]" id="1"
                        <?php if (in_array(7, $habit_id) ) { echo 'checked'; } ?> >
                    <label class="form-check-label" for="1">
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