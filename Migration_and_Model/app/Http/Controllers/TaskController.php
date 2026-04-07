<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'nullable|boolean',
        ]);

        $validated['is_completed'] = $request->has('is_completed');

        Task::create($validated);

        // FIXED: Changed redirect('/tasks') to redirect()->route('tasks.index')
        // redirect('/tasks') builds the URL using APP_URL + port which causes
        // port doubling in Codespaces (e.g. ...8000.app.github.dev:8000/tasks)
        // redirect()->route('tasks.index') uses Laravel's named route system
        // which correctly resolves the URL without duplicating the port
        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'nullable|boolean',
        ]);

        $validated['is_completed'] = $request->has('is_completed');

        $task->update($validated);

        // FIXED: Same reason as store() above
        // redirect('/tasks') was causing port doubling after updating a task
        // redirect()->route('tasks.index') resolves correctly in Codespaces
        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        // FIXED: Same reason as store() and update() above
        // redirect('/tasks') was causing port doubling after deleting a task
        // redirect()->route('tasks.index') resolves correctly in Codespaces
        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}