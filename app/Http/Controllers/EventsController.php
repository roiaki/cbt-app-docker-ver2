<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventsController extends Controller
{
    // event一覧表示
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $events = $user->events()->orderBy('updated_at', 'desc')->paginate(5);

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

        return view('events.show', ['event' => $event]);
        //return redirect('/events');
    }

    
    // 詳細ページ表示処理
    public function show($id)
    {
        $event = Event::find($id);

        return view('events.show', ['event' => $event]);
    }

    // 編集処理
    public function edit($id)
    {
        $event = Event::find($id);

        return view('events.edit', ['event' => $event]);
    }

    // 更新
    public function update(Request $request, $id)
    {
        // dd($request);   // 追加

        $this->validate($request, [
            'title' => 'required|max:30',
            'content' => 'required|max:255',
        ]);

        $event = event::find($id);
        $event->title = $request->title;
        $event->content = $request->content;
 
        $event->save();

        return redirect('/events');
    }

    // deleteでcolumn/id　にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $event = event::find($id);
        $event->delete();

        return redirect('/events');
    }

    public function info()
    {
        return view('/users/info');
    }

    public function fix($id)
    {
        $event = event::find($id);

        return view('seven_columns.create', [
            'event' => $event]
        );
    }

    public function seven_index() 
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $events = $user->events()->orderBy('created_at')->paginate(10);

            $data = [
                'user' => $user,
                'events' => $events
            ];
        }
        return view('events.seven_index', $data);
    }
}
