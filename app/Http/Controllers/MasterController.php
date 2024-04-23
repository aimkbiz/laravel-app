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
        return TodoResource::collection(MasterAiChat::allCache());
    }
}
