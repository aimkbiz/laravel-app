<?php

namespace App\Http\Controllers;

use App\Models\MasterAiChat;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index() {
        $aiChats = MasterAiChat::all();
        return view('aiChat', ['aiChats' => $aiChats]);
    }

    public function apiAiChat() {
        $aiChats = MasterAiChat::all();

        return response()->json(
            [
                ["aiChats" => $aiChats,]
            ],
             200,[],
             JSON_UNESCAPED_UNICODE //文字化け対策
        );
    }
}
