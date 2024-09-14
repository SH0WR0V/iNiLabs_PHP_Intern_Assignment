<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('Pages.index', compact('todos'));
    }

    public function create()
    {
        return view('Pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean'
        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->is_completed,
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo created successfully!');
    }

    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return view('Pages.details', compact('todo'));
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('Pages.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',  
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update($request->all());

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully!');
    }


    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully!');
    }
}

?>


