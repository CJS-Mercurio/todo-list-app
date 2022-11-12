<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo = Todo::all();
        return response($todo, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = Todo::create($request->all());

        // Moved to TodoRequest to handle the validation
        // $data = $request->validate([
        //     'title' => 'required',
        //     'description' => 'required'
        // ]);

        return response($todo, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return Todo::find($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        // $todo = Todo::find($id);
        $todo->update($request->all());

        // return response($todo, 200);
        return response()->json([
            'status' => true,
            'message' => "Todo updated successfully.",
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
            'status' => true,
            'message' => "Todo deleted successfully.",
        ]);
    }
}
