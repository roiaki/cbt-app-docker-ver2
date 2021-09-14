<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ThreeColumn;    // 追加
use App\Models\Event;    // 追加

class ThreeColumnsController extends Controller
{
    // 一覧表示
    public function index()
    {
        /*
        $three_columns = three_column::paginate(25);

        // $three_columns = three_column::all();

        // 第二引数：連想配列でテンプレートに渡すデータ  [キー　=> バリュー]
        return view('three_columns.index', [
            'three_columns' => $three_columns,
        ]); 
    */
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $three_columns = $user->three_columns()->orderBy('created_at', 'desc')->paginate(13);

            $data = [
                'user' => $user,
                'three_columns' => $three_columns,
            ];
        }

        return view('three_columns.index', $data);
    }

    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    public function create(Request $request)
    {
        dd($request);
        $event = Event::find(1);
        $threecolumn = new ThreeColumn;
        
        $data = [
            'event' => $event,
            'three_column' => $threecolumn
        ];

        // 第二引数：連想配列でテンプレートに渡すデータ　[キー　=> バリュー]
        return view('three_columns.create', [
            'data' => $data
        ]);
        /*
        $seven_column = new SevenColumn;
        $three_column = three_column::find($id);

        //dd($request);
        //dd($three_column);
        return view('seven_columns.create', [
            'seven_column' => $seven_column,
            'three_column' => $three_column
        ]);
        */
    }

    // 保存処理
    public function store(Request $request)
    {
        //dd($request);
        /*
        $this->validate(
            $request,
            [
                'title' => 'required|max:30',
                'content' => 'required|max:255',
                'emotion_name' => 'required',
                'emotion_strength' => 'required',
                'thinking' => 'required',  
            ]
        );
        */

        $three_column = new ThreeColumn;
        // 送られてきたフォームの内容は　$request　に入っている。
        $three_column->title = $request->title;
        $three_column->content = $request->content;

        $three_column->emotion_name = $request->emotion_name;
        $three_column->emotion_strength = $request->emotion_strength;
        $three_column->thinking = $request->thinking;

        dd($request['habit']['0']);

        //$three_column->

        // ログインしているユーザーIDを渡す
        $three_column->user_id = \Auth::id();

        $three_column->save();

        return redirect('/three_columns');
    }

    // 詳細ページ表示処理
    public function show($id)
    {
        $three_column = three_column::find($id);

        return view('three_columns.show', ['three_column' => $three_column]);
    }

    // 編集処理
    public function edit($id)
    {
        $three_column = three_column::find($id);

        return view('three_columns.edit', ['three_column' => $three_column]);
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
        // dd($request);   // 追加

        $this->validate($request, [
            'title' => 'required|max:30',
            'content' => 'required|max:255',
            'emotion_name' => 'required',
            'emotion_strength' => 'required',
            'thinking' => 'required'

        ]);

        $three_column = three_column::find($id);
        $three_column->title = $request->title;
        $three_column->content = $request->content;

        $three_column->emotion_name = $request->emotion_name;
        $three_column->emotion_strength = $request->emotion_strength;
        $three_column->thinking = $request->thinking;

        $three_column->save();

        return redirect('/three_columns');
    }

    // deleteでcolumn/id　にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $three_column = three_column::find($id);
        $three_column->delete();

        return redirect('/three_columns');
    }

    public function info()
    {
        return view('/users/info');
    }

    public function fix($id)
    {
        $three_column = three_column::find($id);

        return view('seven_columns.create', [
            'three_column' => $three_column]
        );
    }

    public function seven_index() 
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $three_columns = $user->three_columns()->orderBy('created_at')->paginate(10);

            $data = [
                'user' => $user,
                'three_columns' => $three_columns
            ];
        }
        return view('three_columns.seven_index', $data);
    }

    // 7コラム作成処理
    public function fix_save(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|max:30',
                'content' => 'required|max:255',
                'emotion_name' => 'required',
                'emotion_strength' => 'required',
                'thinking' => 'required',
                
                'basis_thinking' => 'required',
                'opposite_fact' => 'required',
                'new_thinking' => 'required',
                'new_emotion' => 'required',
            ]
        );

        $three_column = three_column::find($id);
        // 送られてきたフォームの内容は　$request　に入っている。
        $three_column->title = $request->title;
        $three_column->content = $request->content;

        $three_column->emotion_name = $request->emotion_name;
        $three_column->emotion_strength = $request->emotion_strength;
        $three_column->thinking = $request->thinking;

        $three_column->basis_thinking = $request->basis_thinking;
        $three_column->opposite_fact = $request->opposite_fact;
        $three_column->new_thinking = $request->new_thinking;
        $three_column->new_emotion = $request->new_emotion;
    
        // ログインしているユーザーIDを渡す
        $three_column->user_id = \Auth::id();

        $three_column->save();

        return redirect('/three_columns');
    }
}
