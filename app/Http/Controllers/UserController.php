<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile(){
        // ログインユーザーを取得する
        $user = Auth::user();

        $params = [
            'user' => $user,
        ];
        return view('users.show', $params);
    }
}
