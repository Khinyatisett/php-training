<?php

namespace App\Dao\Task;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Service class for task.
 */
class TaskDao implements TaskDaoInterface
{
    /**
    * Display All Tasks
    */
  public function displayTasks()
  {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return $tasks;
  }

  /**
    * Add A New Task
    */
  public function addTasks(Request $request){
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
  }

  /**
    * Delete A New Task
    */
  public function deleteTasks($id){
    Task::findOrFail($id)->delete();
  }
}