<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTodo;

class UserTodoController extends Controller
{
    public function index() {
        $todos = UserTodo::all();
        return view('userTodo', ['todos' => $todos]);
    }

    public function create(Request $request) {
        UserTodo::create([  
            "todo" => $request->todo,  
            "status" => "1",  
        ]);
        return redirect("userTodo");
    }

    public function update(Request $request) {
        $userTodo = UserTodo::find($request->id);
        $userTodo->update([  
            "todo" => $request->todo, 
        ]);
        return redirect("userTodo");
    }

    public function delete(Request $request) {
        $userTodo = UserTodo::find($request->id);
        $userTodo->delete();
        return redirect("userTodo");
    }
}
