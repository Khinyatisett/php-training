<?php

namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Service class for task.
 */
class TaskService implements TaskServiceInterface
{
  /**
   * task dao
   */
  private $taskDao;
  /**
   * Class Constructor
   * @param TaskDaoInterface
   * @return
   */
  public function __construct(TaskDaoInterface $taskDao)
  {
    $this->taskDao = $taskDao;
  }
  /**
   * Display all tasks
   */
  public function displayTasks()
  {
    return $this->taskDao->displayTasks();
  }

  /**
   * Add a new task
   */
  public function addTasks(Request $request){
    return $this->taskDao->addTasks($request);
  }
  /**
   * Delete task
   */
  public function deleteTasks($id)
  {
      return $this->taskDao->deleteTasks($id);
  }
}