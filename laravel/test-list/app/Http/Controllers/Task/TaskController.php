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
   * To show create task view
   * 
   * @return View create tasks
   */
    public function displayTasks(){
        $tasks = $this->taskInterface->displayTasks();
        return view('tasks', compact('tasks')); 
    }

      /**
   * To submit task create tasks 
   * @param Request $request
   * @return View tasks
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
   * To delete post by id
   * @return View task
   */
    public function deleteTasks($id){
        $tasks = $this->taskInterface->deleteTasks($id);
        return redirect('/');
    }


}
