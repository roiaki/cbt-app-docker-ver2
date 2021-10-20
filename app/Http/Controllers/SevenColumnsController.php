<?php

namespace App\Http\Controllers;

use App\Models\ThreeColumn;    // 追加
use App\Models\Event;          // 追加
use App\Models\SevenColumn;
use Illuminate\Http\Request;


class SevenColumnsController extends Controller
{
    // 一覧画面表示
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $sevencolumns = $user->seven_columns()->orderBy('updated_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'seven_columns' => $sevencolumns
            ];
        }
        return view('seven_columns.index', $data);
    }

    // 7コラム新規作成画面へ遷移
    public function create($id)
    {
        $user = \Auth::user();
        $user_id = $user->id;

        //$seven_column = new SevenColumn;
        $threecolumn = ThreeColumn::find($id);

        //dd($request);
        //dd($column);
        return view('seven_columns.create', [
            //'sevencolumn' => $sevencolumn,
            'threecolumn' => $threecolumn
        ]);
    }
    
    // 保存処理
    public function store(Request $request)
    {
        try {
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
            //dd($request);
            $seven_column = new SevenColumn();
            // 送られてきたフォームの内容は　$request　に入っている。
            $seven_column->title = $request->title;
            $seven_column->content = $request->content;

            $seven_column->emotion_name = $request->emotion_name;
            $seven_column->emotion_strength = $request->emotion_strength;
            $seven_column->thinking = $request->thinking;
            $seven_column->basis_thinking = $request->basis_thinking;
            $seven_column->opposite_fact = $request->opposite_fact;
            $seven_column->new_thinking = $request->new_thinking;
            $seven_column->new_emotion = $request->new_emotion;

            // ログインしているユーザーIDを渡す
            $seven_column->user_id = \Auth::id();

            // どうするか
            $seven_column->threecol_id = $request->threecol_id;
            $seven_column->event_id = $request->event_id;

            $seven_column->save();
            //dd($seven_column);
        } catch (Exception $e) {
            report($e);
            session()->flash('flash_message', '保存が失敗しました。');
        }
        session()->flash('flash_message', '保存完了');
        return redirect('seven_columns');
    }

    // 詳細ページ表示処理
    public function show($id)
    {
        $seven_column = SevenColumn::find($id);

        return view('seven_columns.show', ['seven_column' => $seven_column]);
    }

    // 編集画面表示処理
    public function edit($id)
    {
        $seven_column = SevenColumn::find($id);
        return view('seven_columns.edit', [
            'seven_column' => $seven_column
        ]);
    }

    // update処理
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|max:30',
                'content' => 'required|max:255',
                'emotion_name' => 'required',
                'emotion_strength' => 'required',
                'thinking' => 'required'

            ]
        );

        try {
            $seven_column = SevenColumn::find($id);
            $seven_column->title = $request->title;
            $seven_column->content = $request->content;

            $seven_column->emotion_name = $request->emotion_name;
            $seven_column->emotion_strength = $request->emotion_strength;
            $seven_column->thinking = $request->thinking;
            $seven_column->basis_thinking = $request->basis_thinking;
            $seven_column->opposite_fact = $request->opposite_fact;
            $seven_column->new_thinking = $request->new_thinking;
            $seven_column->new_emotion = $request->new_emotion;
            $seven_column->updated_at = date('Y-m-d h:i:s');
            $seven_column->save();

        } catch (Exception $e) {
            report($e);
            session()->flash('flash_message', 'kousinn が失敗しました。');
        }
        return redirect('seven_columns');
    }

    // 削除処理
    public function destroy($id)
    {
        $seven_column = SevenColumn::find($id);
        $seven_column->delete();

        return redirect('seven_columns');
    }
}
