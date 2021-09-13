<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    // event一覧表示
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
            $events = $user->events()->orderBy('created_at', 'desc')->paginate(5);

            $data = [
                'user' => $user,
                'events' => $events,
            ];
        }

        return view('events.index', $data);
    }

    // getでevents/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        
        $event = new Event;

        // 第二引数：連想配列でテンプレートに渡すデータ　[キー　=> バリュー]
        return view('event.create', [
            'event' => $event
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
}
