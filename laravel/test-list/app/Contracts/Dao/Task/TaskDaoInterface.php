<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface TaskDaoInterface
{   
    /**function for display all task  */
    public function displayTasks();

    /** function for adding new task*/
    public function addTasks(Request $request);

    /** function for delete existing task */
    public function deleteTasks($id);
}