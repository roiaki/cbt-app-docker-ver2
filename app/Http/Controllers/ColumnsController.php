<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Column;    // 追加


class ColumnsController extends Controller
{
    // 一覧表示
    public function index()
    {
        /*
        $columns = Column::paginate(25);

        // $columns = Column::all();

        // 第二引数：連想配列でテンプレートに渡すデータ  [キー　=> バリュー]
        return view('columns.index', [
            'columns' => $columns,
        ]); 
    */
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $columns = $user->columns()->orderBy('created_at', 'desc')->paginate(13);

            $data = [
                'user' => $user,
                'columns' => $columns,
            ];
        }

        return view('columns.index', $data);
    }

    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        
        $column = new Column;

        // 第二引数：連想配列でテンプレートに渡すデータ　[キー　=> バリュー]
        return view('columns.create', [
            'column' => $column
        ]);
        /*
        $seven_column = new SevenColumn;
        $column = Column::find($id);

        //dd($request);
        //dd($column);
        return view('seven_columns.create', [
            'seven_column' => $seven_column,
            'column' => $column
        ]);
        */
    }

    // 保存処理
    public function store(Request $request)
    {
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

        $column = new Column;
        // 送られてきたフォームの内容は　$request　に入っている。
        $column->title = $request->title;
        $column->content = $request->content;

        $column->emotion_name = $request->emotion_name;
        $column->emotion_strength = $request->emotion_strength;
        $column->thinking = $request->thinking;

        $column->basis_thinking = $request->basis_thinking;
        $column->opposite_fact = $request->opposite_fact;
        $column->new_thinking = $request->new_thinking;
        $column->new_emotion = $request->new_emotion;

        // ログインしているユーザーIDを渡す
        $column->user_id = \Auth::id();

        $column->save();

        return redirect('/columns');
    }

    // 詳細ページ表示処理
    public function show($id)
    {
        $column = Column::find($id);

        return view('columns.show', ['column' => $column]);
    }

    // 編集処理
    public function edit($id)
    {
        $column = Column::find($id);

        return view('columns.edit', ['column' => $column]);
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

        $column = Column::find($id);
        $column->title = $request->title;
        $column->content = $request->content;

        $column->emotion_name = $request->emotion_name;
        $column->emotion_strength = $request->emotion_strength;
        $column->thinking = $request->thinking;

        $column->save();

        return redirect('/columns');
    }

    // deleteでcolumn/id　にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $column = Column::find($id);
        $column->delete();

        return redirect('/columns');
    }

    public function info()
    {
        return view('/users/info');
    }

    public function fix($id)
    {
        $column = Column::find($id);

        return view('seven_columns.create', [
            'column' => $column]
        );
    }

    public function seven_index() 
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $columns = $user->columns()->orderBy('created_at')->paginate(10);

            $data = [
                'user' => $user,
                'columns' => $columns
            ];
        }
        return view('columns.seven_index', $data);
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

        $column = Column::find($id);
        // 送られてきたフォームの内容は　$request　に入っている。
        $column->title = $request->title;
        $column->content = $request->content;

        $column->emotion_name = $request->emotion_name;
        $column->emotion_strength = $request->emotion_strength;
        $column->thinking = $request->thinking;

        $column->basis_thinking = $request->basis_thinking;
        $column->opposite_fact = $request->opposite_fact;
        $column->new_thinking = $request->new_thinking;
        $column->new_emotion = $request->new_emotion;
    
        // ログインしているユーザーIDを渡す
        $column->user_id = \Auth::id();

        $column->save();

        return redirect('/columns');
    }
}
