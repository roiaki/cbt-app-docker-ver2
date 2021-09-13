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
}
