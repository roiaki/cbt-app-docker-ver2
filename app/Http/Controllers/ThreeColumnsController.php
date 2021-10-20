<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ThreeColumn;    // 追加
use App\Models\Event;          // 追加


class ThreeColumnsController extends Controller
{
    // 一覧表示
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $three_columns = $user->three_columns()->orderBy('updated_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'three_columns' => $three_columns,
            ];
        }

        return view('three_columns.index', $data);
    }

    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    public function create($id)
    {
        //dd($e->event_id);
        $user = \Auth::user();
        $user_id = $user->id;
        //dd($user_id);
        $event = Event::where('id', $id)->where('user_id', $user_id)->first();
        $threecolumn = new ThreeColumn;

        $data = [
            'event' => $event,
            'user' => $user,
            'three_column' => $threecolumn
        ];

        // 第二引数：連想配列でテンプレートに渡すデータ　[キー　=> バリュー]
        return view('three_columns.create', $data);
    }

    // 保存処理
    public function store(Request $request)
    {
        //dd($request);

        $this->validate(
            $request,
            [
                'emotion_name' => 'required',
                'emotion_strength' => 'required',
                'thinking' => 'required',
            ]
        );

        $three_column = new ThreeColumn;

        // ログインしているユーザーIDを渡す
        $three_column->user_id = \Auth::id();
        
        //eventsテーブルのidをthree_columnsテーブルのevent_idに格納
        $three_column->event_id = $request->eventid;
        $three_column->title = $request->title;
        $three_column->content = $request->content;
        $three_column->emotion_name = $request->emotion_name;
        $three_column->emotion_strength = $request->emotion_strength;
        $three_column->thinking = $request->thinking;

        //dd($three_column);
        // 中間テーブルの保存はthree_column保存の後でないとidがない
        $three_column->save();

        //$test = $request->habit[5];
        //dd($request);

        // チェックリストhabitを中間テーブルに保存
        if (isset($request->habit[0])) {
            if ($request->habit[0] == "on") {
                $three_column->habit()->attach(1);
            }
        }
        
        if (isset($request->habit[1])) {
            if ($request->habit[1] == "on") {
                $three_column->habit()->attach(2);
            }
        }

        if (isset($request->habit[2])) {
            if ($request->habit[2] == "on") {
                $three_column->habit()->attach(3);
            }
        }

        if (isset($request->habit[3])) {
            if ($request->habit[3] == "on") {
                $three_column->habit()->attach(4);
            }
        }

        if (isset($request->habit[4])) {
            if ($request->habit[4] == "on") {
                $three_column->habit()->attach(5);
            }
        }

        if (isset($request->habit[5])) {
            if ($request->habit[5] == "on") {
                $three_column->habit()->attach(6);
            }
        }

        if (isset($request->habit[6])) {
            if ($request->habit[6] == "on") {
                $three_column->habit()->attach(7);
            }
        }

        $three_column->save();

        return redirect('/three_columns');
    }

    // 詳細ページ表示処理
    public function show($id)
    {
        //$event = Event::find($id);

        //dd($id);
        $three_column = ThreeColumn::find($id);
        
        $event_id = $three_column->event_id;
        $event = Event::find($event_id);
        
        // 考え方の癖 id 取得
        foreach ($three_column->habit as $habit) {
            $habit_id[] = $habit->id;
        }

        //dd($habit_id);
        $user = \Auth::user();
        
        // ない時はからを格納
        if ( !isset($habit_id) ) {
            $habit_id = [];
        }

        $data = [
            'user' => $user,
            'event' => $event,
            'habit_id' => $habit_id,
            'three_column' => $three_column
        ];
        //dd($data);

        // $data 配列そのまま渡すか、連想配列として渡すかでbladeでのアクセス方法が変わる
        // return view('three_columns, ['data' => $data]);
        return view('three_columns.show', $data);
    }

    // 編集処理
    public function edit($id)
    {
        //dd($id);
        $three_column = ThreeColumn::find($id);
        
        $event_id = $three_column->event_id;
        $event = Event::find($event_id);
        
        // 考え方の癖 id 取得
        foreach ($three_column->habit as $habit) {
            $habit_id[] = $habit->id;
        }
        if ( !isset($habit_id) ) {
            $habit_id = [];
        }

        $data = [
            'three_column' => $three_column,
            'habit_id' => $habit_id,
            'event' => $event
        ];

        //dd($three_column);
        return view('three_columns.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:30',
            'content' => 'required|max:255',
            'emotion_name' => 'required',
            'emotion_strength' => 'required',
            'thinking' => 'required'
        ]);

        $three_column = ThreeColumn::find($id);

        $three_column->emotion_name = $request->emotion_name;
        $three_column->emotion_strength = $request->emotion_strength;
        $three_column->thinking = $request->thinking;

        $three_column->updated_at = date("Y-m-d h:m:s");

        $three_column->save();

        // チェックリストhabitを中間テーブルを更新
        if (isset($request->habit[0])) {
            if ($request->habit[0] == "on") {
                $three_column->habit()->syncWithoutDetaching(1);
            }
        } else {
            $three_column->habit()->detach(1);
        }

        if (isset($request->habit[1])) {
            if ($request->habit[1] == "on") {
                $three_column->habit()->syncWithoutDetaching(2);
            }
        } else {
            $three_column->habit()->detach(2);
        }

        if (isset($request->habit[2])) {
            if ($request->habit[2] == "on") {
                $three_column->habit()->syncWithoutDetaching(3);
            }
        } else {
            $three_column->habit()->detach(3);
        }

        if (isset($request->habit[3])) {
            if ($request->habit[3] == "on") {
                $three_column->habit()->syncWithoutDetaching(4);
            }
        } else {
            $three_column->habit()->detach(4);
        }

        if (isset($request->habit[4])) {
            if ($request->habit[4] == "on") {
                $three_column->habit()->syncWithoutDetaching(5);
            }
        } else {
            $three_column->habit()->detach(5);
        }

        if (isset($request->habit[5])) {
            if ($request->habit[5] == "on") {
                $three_column->habit()->syncWithoutDetaching(6);
            }
        } else {
            $three_column->habit()->detach(6);
        }

        if (isset($request->habit[6])) {
            if ($request->habit[6] == "on") {
                $three_column->habit()->syncWithoutDetaching(7);
            }
        } else {
            $three_column->habit()->detach(7);
        }
//dd($three_column->habit());

        return redirect('/three_columns');
    }

    // deleteでcolumn/id　にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $three_column = ThreeColumn::find($id);
        $three_column->delete();

        return redirect('/three_columns');
    }

    public function info()
    {
        return view('/users/info');
    }

}