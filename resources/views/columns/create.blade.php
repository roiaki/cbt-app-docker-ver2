@extends('layouts.app')

@section('content')

<h3>新規作成</h3>

<div class="row">
    <div class="col-7">
        <!-- model 第一引数：Modelのインスタンス、第二引数：連想配列　-->
        {!! Form::model($column, ['route' => 'columns.store']) !!}

        <div class="form-group">
            <!-- タイトル -->
            <label for="title">タイトル</label>
            <!-- idはグローバル属性であり、HTML内の全ての要素に適用される。
                 name属性はHTMLの特定の要素（フォーム要素）主にバックエンド
            -->
            <input type="text" class="form-control" id="title" name="title">
            
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
            <label for="content">内容</label>
            <textarea class="form-control" id="content" name="content" cols="90" rows="7"></textarea>

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
            <label for="emotion_name">感情名</label>
            <input type="text" class="form-control" id="emotion_name" name="emotion_name">
            
            <!-- 感情名必須バリデーション表示-->
            @if($errors->has('emotion_name'))
            @foreach($errors->get('emotion_name') as $message)
            <ul>
                <li class="ml-2 my-1 text-danger">{{ $message }}</li>
            </ul>
            @endforeach
            @endif   
        </div>
        
        <div class="form-group">
            <label for="emotion_strength">強さ</label>
            <input type="number" class="form-control" id="emotion_strength" name="emotion_strength">
            
            <!-- 感情名必須バリデーション表示-->
            @if($errors->has('emotion_strength'))
            @foreach($errors->get('emotion_strength') as $message)
            <ul>
                <li class="ml-2 my-1 text-danger">{{ $message }}</li>
            </ul>
            @endforeach
            @endif
        </div>
        


        <div class="form-group">
            <label for="thoughts">その時考えたこと</label><br>
            <textarea class="form-control" id="thoughts" name="thoughts" cols="90" rows="7"></textarea>
            
            <!-- 感情名必須バリデーション表示-->
            @if($errors->has('thoughts'))
            @foreach($errors->get('thoughts') as $message)
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
        {!! Form::submit('作成', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection