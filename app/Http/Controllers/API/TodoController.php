<?php

namespace App\Http\Controllers\API;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\TodoResource;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TodoResource::collection(
            Todo::where('user_id', Auth::user()->id)->get()
        );
        // $todo = Todo::where('user_id', Auth::user()->id)->get();
        // return response($todo, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $todo = Todo::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return new TodoResource($todo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        if (Auth::user()->id !== $todo->user_id) {
            return response()->json([
                'message' => "You are not authorized to make this request."
            ], 403);
        }
        return new TodoResource($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TodoRequest  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        if (Auth::user()->id !== $todo->user_id) {
            return response()->json([
                'message' => "You are not authorized to make this request."
            ], 403);
        }

        $todo->update($request->all());

        return new TodoResource($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        if (Auth::user()->id !== $todo->user_id) {
            return response()->json([
                'message' => "You are not authorized to make this request."
            ], 403);
        }

        $todo->delete();

        // return response(null, 203);
        return response()->json([
            'message' => "Todo deleted successfully."
        ]);
    }
}
