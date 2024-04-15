<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Productモデルを呼び出す
use App\Models\UserTodo;

class UserTodoController extends Controller
{
    public function index() {
        $todos = UserTodo::all();
        return view('userTodo', ['todos' => $todos]);
    }
}
