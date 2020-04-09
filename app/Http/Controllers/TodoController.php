<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

use Brian2694\Toastr\Facades\Toastr;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos', $todos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|min:6|max:20',
            'details' => 'required'
        ]);
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->details = $request->details;
        $todo->save();
        Toastr::success('Todo Created Successfully !', 'Created !');
        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo', $todo));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo', $todo));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $this->validate(request(), [
            'title' => 'required|min:6|max:20',
            'details' => 'required'
        ]);
        $todo->title = $request['title'];
        $todo->details = $request['details'];
        $todo->save();
        Toastr::success('Todo Updated Successfully !', 'Updated !');
        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        Toastr::success('Todo Deleted Successfully !', 'Deleted !');
        return redirect()->route('todos.index');
    }
}
