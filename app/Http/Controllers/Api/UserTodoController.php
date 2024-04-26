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
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $userTodo = UserTodo::find($request->id);
        $userTodo->update([  
            "todo" => $request->todo, 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $userTodo = UserTodo::find($request->id);
        $userTodo->delete();
    }
}
