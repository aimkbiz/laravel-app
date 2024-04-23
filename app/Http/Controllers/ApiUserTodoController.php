<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTodo;
use Illuminate\Support\Facades\Auth;

class ApiUserTodoController extends Controller
{
    public function index() {
        $todos = UserTodo::where('user_id', 1)->get();
        return response()->json(['hoge' => $todos]);
        //return response()->json(['hoge' => 'Hello from Laravel']);
    }

    public function create(Request $request) {
        UserTodo::create([  
            "user_id" => Auth::user()->id,
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