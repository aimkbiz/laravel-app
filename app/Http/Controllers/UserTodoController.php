<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTodo;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

/**
 * ユーザーTODOコントローラ－
 */
class UserTodoController extends Controller
{
    /**
     * ユーザーTODO情報を取得する
     *
     * @return App\Models\UserTodo $todos
     */
    public function index() {
        $todos = UserTodo::where('user_id', Auth::user()->id)->get();
        //return Inertia::render('userTodo', ['todos' => $todos]);
        return response()->json($todos, 200);
    }

    public function create(Request $request) {
        error_log($request->todo);
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
        error_log($request->id + $request->todo);
        $userTodo = UserTodo::find($request->id);
        $userTodo->update([  
            "todo" => $request->todo, 
        ]);
        return redirect("userTodo");
    }

    public function delete(Request $request) {
        error_log($request->id);
        //error_log($request);
        $userTodo = UserTodo::find($request->id);
        //$userTodo = UserTodo::find('19');
        $userTodo->delete();
        return redirect("userTodo");
    }
}
