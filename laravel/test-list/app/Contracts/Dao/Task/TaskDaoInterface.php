<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface TaskDaoInterface
{   
    /**
    * To show create task view
    * 
    * @return View create tasks
    */
    public function displayTasks();

    /**
    * To submit task create tasks 
    * @param Request $request
    * @return View tasks
    */
    public function addTasks(Request $request);

    /**
    * To delete post by id
    * @return View task
    */
    public function deleteTasks($id);
}