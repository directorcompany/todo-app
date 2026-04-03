<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->search) {
            $query->where('title', 'like', "%{$request->search}%");
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $tasks = $query->orderBy('created_at', 'desc')->paginate(10)->appends($request->all());

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Новая,В работе,Выполнена',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Задача создана успешно');
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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Новая,В работе,Выполнена',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Задача обновлена успешно');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Задача удалена успешно');
    }

    // AJAX обновление статуса
    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:Новая,В работе,Выполнена',
        ]);

        $task->update(['status' => $request->status]);

        return response()->json(['success' => true, 'status' => $task->status]);
    }
}