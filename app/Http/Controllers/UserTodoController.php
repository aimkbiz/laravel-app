<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTodo;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserTodoController extends Controller
{

    /**
     * ユーザー情報を取得する
     *
     * @return App\Models\UserTodo $todos
     */
    public function index() {
        $todos = UserTodo::where('user_id', Auth::user()->id)->get();
        return Inertia::render('userTodo', ['todos' => $todos]);
    }

    public function create(Request $request) {
        UserTodo::create([  
            "user_id" => Auth::user()->id,
            "todo" => $request->todo,
            "status" => "1",  
        ]);
        //$todos = UserTodo::where('user_id', 1)->get();
        //return Inertia::render('userTodo', ['todos' => $todos]);
        //return redirect('/');
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
