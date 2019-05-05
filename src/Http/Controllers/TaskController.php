<?php

namespace Whylab\Todolist\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Whylab\Todolist\Helper\ValidatorHelper;
use Whylab\Todolist\Model\Task;

class TaskController extends Controller
{
    /**
     * @var array
     */
    private $rules = [
        'name' => 'required'
    ];

    /** @var array */
    private $messages;

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        return redirect()->route('todo.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $tasks = Task::all();
        $submit = __('todolist::todo.form.buttons.add');
        $buttonTitle = __('todolist::todo.form.buttons.title.add');

        return view('todolist::list', compact('tasks', 'submit', 'buttonTitle'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validate = $this->validataForm($request)->validate();
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        Task::create($request->all());

        return redirect()->route('todo.create')->with('success', __('todolist::validate.messages.success.create'));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $tasks = Task::all();
        $task = $tasks->find($id);
        $submit = __('todolist::todo.form.buttons.update');
        $buttonTitle = __('todolist::todo.form.buttons.title.update');

        return view('todolist::list', compact('tasks', 'task', 'submit', 'buttonTitle'));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validataForm($request)->validate();
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $task = Task::findOrFail($id);
        $task->update($request->all());

        return redirect()->route('todo.create')->with('success', __('todolist::validate.messages.success.update'));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('todo.create')->with('success', __('todolist::validate.messages.success.delete'));
    }

    /**
     * @return array
     */
    private function getMessages()
    {
        $this->messages = [
            'name.required' => __('todolist::validate.errors.required.name')
        ];

        return $this->messages;
    }

    /**
     * @param Request $request
     * @return ValidatorHelper
     */
    private function validataForm(Request $request)
    {
        return new ValidatorHelper($request, $this->rules, $this->getMessages());
    }
}
