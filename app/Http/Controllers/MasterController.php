<?php

namespace App\Http\Controllers;

use App\Models\MasterAiChat;


class MasterController extends Controller
{
    public function index() {
        $aiChats = MasterAiChat::allCache();
        return view('aiChat', ['aiChats' => $aiChats]);
    }

    public function apiAiChat() {
        $aiChats = MasterAiChat::allCache();

        return response()->json(
            [
                ["aiChats" => $aiChats,]
            ],
             200,[],
             JSON_UNESCAPED_UNICODE
        );
    }
}
