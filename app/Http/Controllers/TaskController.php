<?php

namespace App\Http\Controllers;

use App\Task;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Repositories\TaskRepository;

use App\Classes\DueDateCalculator;

class TaskController extends Controller
{

    protected $tasks;

    //
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);
        $name = $request->name;

        $dateCheck = new DueDateCalculator($name);

        $dates = $dateCheck->getDueDatesSpecifiedByTask();

        if(count($dates) > 0) {
          $request->user()->tasks()->create([
              'name'=> $request->name,
              'due_date' => $dates[1],
          ]);
        } else {
          $request->user()->tasks()->create([
              'name'=> $request->name,
          ]);
        }


        return redirect('/tasks');
    }

    public function index(Request $request)
    {

        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function destroy(Request $request, Task $task)
    {
        //TODO: Setup an authorization policy for destroying tasks as a security measure
        //$this->authorize('destroy', $task);
        $task->delete();
        return redirect('/tasks');
    }

    //nothing references the below route yet
    public function update(Request $request, Task $task)
    {

            $task->update([
                'name'=> $request->name,
            ]);

        return redirect('/tasks');
    }

    public function toggleTaskCompletion(Request $request, Task $task)
    {
        if($task->completed == TRUE) {
             $task->update([
                'completed'=> FALSE,
            ]);
        }
        else {
            $task->update([
                'completed'=> TRUE,
            ]);
        }
        return redirect('/tasks');
    }
}
