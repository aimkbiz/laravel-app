<?php

namespace App\Http\Controllers;

use App\Models\MasterAiChat;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class MasterController extends Controller
{
    public function index() {
        $aiChats = MasterAiChat::allCache();
        $aiChats = $aiChats->shuffle();
        return Inertia::render('Welcome', [
            'aiChat' => $aiChats[0],
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    public function apiAiChat() {
        return TodoResource::collection(MasterAiChat::allCache());
    }
}
