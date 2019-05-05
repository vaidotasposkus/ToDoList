<?php

namespace Laravel\Todolist\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Todolist\Model\Task;

class TaskController extends Controller
{
    //
    public function index(Request $request)
    {
        return redirect()->route('todo.create');
    }

    public function create(Request $request)
    {
        $tasks = Task::all();
        $submit = 'Add';
        return view('todolist::list', compact('tasks', 'submit'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Task::create($input);
        return redirect()->route('todo.create');
    }

    public function edit(Request $request, $id)
    {
        $tasks = Task::all();
        $task = $tasks->find($id);
        $submit = 'Update';
        return view('todolist::list', compact('tasks', 'task', 'submit'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all;
        $task = Task::findOrFail($id);
        $task->update($input);
        return redirect()->route('todo.create');
    }

    public function destroy(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('todo.create');
    }
}
