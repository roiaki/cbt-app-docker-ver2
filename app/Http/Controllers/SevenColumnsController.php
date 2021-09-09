<?php

namespace App\Http\Controllers;

use App\Models\SevenColumn;
use Illuminate\Http\Request;

class SevenColumnsController extends Controller
{
    // 一覧表示
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seven_columns = $user->seven_columns()->orderBy('created_at')->paginate(10);

            $data = [
                'user' => $user,
                'seven_columns' => $seven_columns
            ];
        }
        return view('seven_columns.index', $data);
    }

    // 新規作成
    public function create()
    {
        $seven_column = new SevenColumn;

        return view('seven_columns.create', [
            'seven_column' => $seven_column
        ]);
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
                'basis_thinking' => 'required',
                'oppsite_thinking' => 'required',
                'new_thinking' => 'required',
                'new_emotion' => 'required',
            ]

        );

        $seven_column = new SevenColumn();
        // 送られてきたフォームの内容は　$request　に入っている。
        $seven_column->title = $request->title;
        $seven_column->content = $request->content;

        $seven_column->emotion_name = $request->emotion_name;
        $seven_column->emotion_strength = $request->emotion_strength;
        $seven_column->thinking = $request->thinking;
        $seven_column->basis_thinking = $request->basis_thinking;
        $seven_column->oppsite_fact = $request->oppsite_fact;
        $seven_column->new_thinking = $request->new_thinking;
        $seven_column->new_emotion = $request->new_emotion;

        // ログインしているユーザーIDを渡す
        $seven_column->user_id = \Auth::id();

        // どうするか
        $seven_column->three_col_id;

        $seven_column->save();

        return redirect('/seven_columns');
    }

    // 詳細ページ表示処理
    public function show($id)
    {
        $seven_column = SevenColumn::find($id);
        return view('seven_column.show', [
            'seven_column' => $seven_column]);

    }

    // 編集処理
    public function edit($id) 
    {
        $seven_column = SevenColumn::find($id);
        return view('seven_column.edit', [
            'seven_column' => $seven_column
        ]);
    }

    // update処理
    public function update(Request $request, $id)
    {
        $this->validate($request, 
        [
            'title' => 'required|max:30',
            'content' => 'required|max:255',
            'emotion_name' => 'required',
            'emotion_strength' => 'required',
            'thinking' => 'required'

        ]);

        $seven_column = SevenColumn::find($id);
        $seven_column->title = $request->title;
        $seven_column->content = $request->content;

        $seven_column->emotion_name = $request->emotion_name;
        $seven_column->emotion_strength = $request->emotion_strength;
        $seven_column->thoughts = $request->thoughts;

        $seven_column->save();

        return redirect('/seven_columns');
    }

    // 
    public function destroy($id)
    {
        $seven_column = SevenColumn::find($id);
        $seven_column->delete();

        return redirect('/seven_columns');
    }
}
