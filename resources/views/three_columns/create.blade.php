@extends('layouts.app')

@section('content')

<div class="row justify-content-center"> 
  <div class="col-sm-8">
    <h3 class="title_head">３コラム新規作成</h3>
      <!-- model 第一引数：Modelのインスタンス、第二引数：連想配列　-->
      <form action="{{ route('three_columns.store') }}" method="POST">
        @csrf
        <input type="hidden" name="eventid" value="{{ $event->id }}">

        <div class="form-group">

          <label for="title">1-1 出来事 の タイトル</label>
          <input type="text"
                class="form-control"
                id="title"
                name="title"
                value="{{ $event->title }}"
                readonly
          >

          <!-- バリデーションエラー表示-->
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
          <label for="content">1-2 出来事 の 内容</label>
          <textarea class="form-control" 
                    id="content" 
                    name="content" 
                    cols="90" 
                    rows="5" 
                    readonly
          >{{ $event->content }}</textarea>

          <!-- バリデーションエラー表示-->
          @if($errors->has('content'))
          @foreach($errors->get('content') as $message)
          <ul>
            <li class="ml-2 my-1 text-danger">{{ $message }}</li>
          </ul>
          @endforeach
          @endif
        </div>

      <div class="row">
        <div class="form-group col">
          <label for="emotion_name">2-1 感情名</label>
          <input type="text"
                 class="form-control"
                 id="emotion_name"
                 name="emotion_name"
                 value="{{ old('emotion_name') }}"
          >
          <div id="form_area01"></div>

          <!-- バリデーションエラー表示-->
          @if($errors->has('emotion_name'))
          @foreach($errors->get('emotion_name') as $message)
          <ul>
            <li class="ml-2 my-1 text-danger">{{ $message }}</li>
          </ul>
          @endforeach
          @endif
        </div>

        <div class="form-group col">
          <label for="emotion_strength">2-2 強さ</label>
          <input type="number"
                 class="form-control"
                 id="emotion_strength"
                 name="emotion_strength"
                 value="{{ old('emotion_strength') }}"
          >

          <!-- バリデーションエラー表示-->
          @if($errors->has('emotion_strength'))
          @foreach($errors->get('emotion_strength') as $message)
          <ul>
            <li class="ml-2 my-1 text-danger">{{ $message }}</li>
          </ul>
          @endforeach
          @endif
        </div>
      </div>

      <div class="form-group">
        <label for="thinking">3-1 その時考えたこと</label><br>
        <p>・感情に一番影響を与えている考えを選ぶ</p>
        <textarea class="form-control" 
                  id="thinking" 
                  name="thinking" 
                  cols="90" 
                  rows="5">{{ old('thinking') }}</textarea>

        <!-- バリデーションエラー表示-->
        @if($errors->has('thinking'))
        @foreach($errors->get('thinking') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>

      <label>3-2 考え方の癖</label>
      <div class="form-group">
      
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[0]" id="1" value="1">
          <label class="form-check-label" for="1">
            一般化のし過ぎ
          </label> 
        </div>
        <p>・1つの出来事や失敗だけを根拠に「いつも～だ」「すべて～ない」のように考える。</p>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[1]" id="2">
          <label class="form-check-label" for="2">
            自分への関連付け
          </label>
        </div>
        <p>・何か良くないことが起こった時、自分に関係ないとこまで自分の責任だと判断する。</p>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[2]" id="3">
          <label class="form-check-label" for="3">
            根拠のない推論
          </label>
        </div>
        <p>・はっきりした証拠がないまま結論を急ぎ、否定的にあれこれ考える。</p>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[3]" id="4">
          <label class="form-check-label" for="4">
            白か黒か思考
          </label>
        </div>
        <p>・ものごとを白が黒で考える。</p>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[4]" id="5">
          <label class="form-check-label" for="5">
            すべき思考
          </label>
        </div>
        <p>・「～すべきだ、～しなければならない」といった思考</p>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[5]" id="6">
          <label class="form-check-label" for="6">
            過大評価と過少評価
          </label>
        </div>
        <p>・自分の欠点や失敗を実際より過大に考え、長所や成功を過少評価する。</p>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[6]" id="7">
          <label class="form-check-label" for="7">
            感情による決めつけ
          </label>
        </div>
        <p>・客観的事実ではなく自分がどのように感じているかという事を元に状況を判断する。</p>

        <!-- バリデーションエラー表示-->
        @if($errors->has('habit'))
        @foreach($errors->get('habit') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>

      <input type="submit" class="btn btn-primary btn-lg" value="作成"> 

      <div class="buttons">
        <button type="button" class="btn btn-secondary btn-lg" onclick="history.back(-1)">戻る</button>
      </div>

    </form>
  
  </div>
</div>

@endsection