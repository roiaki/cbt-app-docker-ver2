<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\SevenColumn;
use App\Models\ThreeColumn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class SevenColumnsController extends Controller
{
    // 一覧画面表示
    public function index()
    {
        $data = [];
        if (Auth::check()) {
            $user = Auth::user();
            $sevencolumns = $user->seven_columns()->orderBy('updated_at', 'desc')->paginate(5);
            $event = $user->events()->first();

            $data = [
                'event' => $event,
                'seven_columns' => $sevencolumns
            ];
            //dd($data);
        }
        return view('seven_columns.index', $data);
    }

    // 検索表示
    public function searchIndex(Request $request)
    {
        $keyword = $request->keyword;
        $id = Auth::user()->id;
        if ($keyword !== null) {
            $seven_columns = DB::table('sevencolumns')
                ->where('user_id', $id)
                ->where(function ($query) use ($keyword) {
                    $query->where('title', 'like', '%' . $keyword . '%')
                        ->orWhere('content', 'like', '%' . $keyword . '%')
                        ->orWhere('thinking', 'like', '%' . $keyword . '%');
                })
                ->orderBy('updated_at', 'desc')
                ->paginate(5);
        } else {
            return view('seven_columns.index');
        }
        $data = [
            'seven_columns' => $seven_columns,
            'keyword' => $keyword
        ];
        return view('seven_columns.index', $data);
    }
    // 7コラム新規作成画面へ遷移
    public function create($id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $threecolumn = ThreeColumn::where('id', $id)->where('user_id', $user_id)->first();

        $event_id = $threecolumn->event_id;
        $event = Event::where('id', $event_id)->where('user_id', $user_id)->first();

        return view('seven_columns.create', [
            'threecolumn' => $threecolumn,
            'event' => $event
        ]);
    }

    // 保存処理
    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'emotion_name' => 'required',
                'emotion_strength' => 'required',
                'thinking' => 'required',
                'basis_thinking' => 'required',
                'opposite_fact' => 'required',
                'new_thinking' => 'required',
                'new_emotion' => 'required',
            ]
        );

        DB::transaction(function () use ($request) {

            $seven_column = new SevenColumn();

            $seven_column->user_id = Auth::id();
            $seven_column->threecol_id = $request->threecol_id;
            $seven_column->event_id = $request->event_id;

            $seven_column->basis_thinking = $request->basis_thinking;
            $seven_column->opposite_fact = $request->opposite_fact;
            $seven_column->new_thinking = $request->new_thinking;
            $seven_column->new_emotion = $request->new_emotion;

            $seven_column->save();
        });

        return redirect('seven_columns');
    }

    // 詳細ページ表示処理
    public function show($id)
    {
        $seven_column = SevenColumn::find($id);
        
        $threecol_id = $seven_column->threecol_id;
        $three_column = ThreeColumn::find($threecol_id);

        $event_id = $seven_column->event_id;
        $event = Event::find($event_id);

        $habit_names = [];
        // 考え方の癖 取得
        foreach ($three_column->habit as $habit) {
            $habit_names[] = $habit->habit_name;
        }

        return view('seven_columns.show', [
            'event' => $event,
            'three_column' => $three_column,
            'seven_column' => $seven_column,
            'habit_names' => $habit_names
        ]);
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
                'basis_thinking' => 'required',
                'opposite_fact' => 'required',
                'new_thinking' => 'required',
                'new_emotion' => 'required'
            ]
        );

        // トランザクション処理
        DB::transaction(function () use ($id, $request) {
            $seven_column = SevenColumn::find($id);
            
            $seven_column->basis_thinking = $request->basis_thinking;
            $seven_column->opposite_fact = $request->opposite_fact;
            $seven_column->new_thinking = $request->new_thinking;
            $seven_column->new_emotion = $request->new_emotion;
            $seven_column->updated_at = date('Y-m-d G:i:s');

            $seven_column->save();
        });
        // end transaction

        // report($e);
        // session()->flash('flash_message', 'kousinn が失敗しました。');

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
