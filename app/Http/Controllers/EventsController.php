<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventsController extends Controller
{
    // event一覧表示
    public function index()
    {
        /*
        $columns = event::paginate(25);

        // $columns = event::all();

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
        return view('events.create', [
            'event' => $event
        ]);
    }

    // postで/eventsへアクセス　保存処理
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|max:30',
                'content' => 'required|max:255',
            ]
        );

        $event = new Event;
        // 送られてきたフォームの内容は　$request　に入っている。
        $event->title = $request->title;
        $event->content = $request->content;

        // ログインしているユーザーIDを渡す
        $event->user_id = \Auth::id();

        $event->save();

        return redirect('/events');
    }
}
