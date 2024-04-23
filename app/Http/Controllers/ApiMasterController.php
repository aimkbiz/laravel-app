<?php

namespace App\Http\Controllers;

use App\Models\MasterAiChat;


class ApiMasterController extends Controller
{
    public function index() {
        $aiChats = MasterAiChat::allCache();
        return response()->json(['aiChat' => $aiChats]);
    }

    public function apiAiChat() {
        return TodoResource::collection(MasterAiChat::allCache());
    }
}
