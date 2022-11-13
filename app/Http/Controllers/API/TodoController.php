<?php

namespace App\Http\Controllers\API;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Http\Controllers\Controller;

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
        $todo = Todo::all();
        return response($todo, 200);

        // return response()->json([
        //     'status' => 'success',
        //     'todo' => $todo
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $todo = Todo::create($request->all());

        // Moved to TodoRequest to handle the validation
        // $data = $request->validate([
        //     'title' => 'required',
        //     'description' => 'required'
        // ]);

        // return response($todo, 200);
        return response()->json([
            'message' => "Todo created successfully.",
            'todo' => $todo
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        // $return = Todo::find($todo);

        return response()->json([
            'todo' => $todo,
        ]);
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
        // $todo = Todo::find($id);
        $todo->update($request->all());

        // return response($todo, 200);
        return response()->json([
            'message' => "Todo list updated successfully.",
            'todo' => $todo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        // return response("Todo deleted successfully", 200);
        return response()->json([
            'message' => "Todo deleted successfully."
        ]);
    }
}
