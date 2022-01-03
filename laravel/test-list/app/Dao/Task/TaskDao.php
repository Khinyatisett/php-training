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
    * To show create task view
    * 
    * @return View create tasks
    */
    public function displayTasks()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return $tasks;
    }

    /**
    * To submit task create tasks 
    * @param Request $request
    * @return View tasks
    */
    public function addTasks(Request $request){
        $tasks = new Task;
        $tasks->name = $request->name;
        $tasks->save();
    }

    /**
    * To delete post by id
    * @return View task
    */
    public function deleteTasks($id){
        Task::findOrFail($id)->delete();
    }
}