<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SevenColumnsController extends Controller
{
    // 一覧表示
    public function index() {
        $data = [];
        if(\Auth::check()) {
            $user = \Auth::user();
            $seven_columns = $user->SevenColumns()->orderBy('created_at')->pagenate(10);

            $data = [
                'user' => $user,
                'seven_columns' => $seven_columns
            ];
        }
        return view('seven_columns.index', $data);
    }

    // 新規作成
    public function create() {
        
        $seven_column = new SevenColumn;
        $column = 
        return veiw('seven_columns.create', [
            'seven_column' => $seven_column
        ]);
    }

    // 保存処理
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:30',
            'content' => 'required|max:255',
            'emotion_name' => 'required',
            'emotion_strength' => 'required',
            'thoughts' => 'required']

        );

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
}
