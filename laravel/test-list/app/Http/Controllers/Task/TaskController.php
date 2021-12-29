<?php

namespace App\Http\Controllers\Task;

use App\Contracts\Services\Task\TaskServiceInterface;
use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
      $this->taskInterface = $taskServiceInterface;
    }
    /**
    * Display All Tasks
    */
    public function displayTasks(){
      
        $tasks = $this->taskInterface->displayTasks();
        return view('tasks', compact('tasks')); 
    }

    /**
    * Add A New Task
    */
    public function addTasks(Request $request){

        $tasks = $this->taskInterface->addTasks($request);
        return redirect('/');
    }
    /**
    * Delete A New Task
    */
    public function deleteTasks($id){
        $tasks = $this->taskInterface->deleteTasks($id);
        return redirect('/');
    }


}
