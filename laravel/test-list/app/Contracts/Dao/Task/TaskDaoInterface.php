<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface TaskDaoInterface
{
    public function displayTasks();

    public function addTasks(Request $request);

    public function deleteTasks($id);
}