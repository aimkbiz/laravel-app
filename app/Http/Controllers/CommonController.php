<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTodo;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

/**
 * 共通コントローラ－
 */
class CommonController extends Controller
{
    /**
     * IP情報を取得する
     */
    public function ip() {
        $list = [];
        $list['ip'] = $_SERVER["REMOTE_ADDR"];
        $list['user_agent'] = $_SERVER["HTTP_USER_AGENT"];
        echo json_encode($list);
    }
}
