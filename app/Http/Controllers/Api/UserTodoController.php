<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserTodo;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        $todos = UserTodo::where('user_id', Auth::user()->id)->get();
        return response()->json($todos, 200);
    }

    /**
     * ユーザーTODO情報を作成する
     */
    public function create(Request $request)
    {
        UserTodo::create([  
            "user_id" => Auth::user()->id,
            "todo" => $request->todo,
            "status" => "1",  
        ]);
        return redirect("userTodo");
    }

    /**
     * ユーザーTODO情報を更新する
     */
    public function update(Request $request)
    {
        $userTodo = UserTodo::find($request->id);
        $userTodo->update([  
            "todo" => $request->todo, 
        ]);
    }

    /**
     * ユーザーTODO情報を削除する
     */
    public function delete(Request $request)
    {
        $userTodo = UserTodo::find($request->id);
        $userTodo->delete();
    }
}
