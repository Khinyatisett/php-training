<?php

namespace App\Contracts\Services\Task;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface TaskServiceInterface
{
    public function displayTasks();

    public function addTasks(Request $request);

    public function deleteTasks($id);
    
}