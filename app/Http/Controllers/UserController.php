<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // 退会処理　物理削除
    public function userDelete($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('/welcome');
    }

    // 退会確認画面
    public function delete_confirm() {
        return view('users.delete_confirm');
    }
}
