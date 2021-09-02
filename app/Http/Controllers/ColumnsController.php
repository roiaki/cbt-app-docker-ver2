<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Column;    // 追加



class ColumnsController extends Controller
{
    // 一覧表示
    public function index() {
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
            $columns = $user->columns()->orderBy('created_at', 'desc')->paginate(10);
            
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
    }

    // 保存処理
    public function store(Request $request)
    {   
        $this->validate($request, [
            'title' => 'required|max:30',
            'content' => 'required|max:255']);

        $column = new Column;
        // 送られてきたフォームの内容は　$request　に入っている。
        $column->title = $request->title;
        $column->content = $request->content;

        $column->emotion_name =$request->emotion_name;
        $column->emotion_strength = $request->emotion_strength;
        $column->thoughts = $request->thoughts;

        // ログインしているユーザーIDを渡す
        $column->user_id =\Auth::id();

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
            'thoughts' => 'required'                
        
        ]);

        $column = Column::find($id);
        $column->title = $request->title;
        $column->content = $request->content;

        $column->emotion_name =$request->emotion_name;
        $column->emotion_strength = $request->emotion_strength;
        $column->thoughts = $request->thoughts;

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
}
