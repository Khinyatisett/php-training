<?php

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface AuthServiceInterface
{
    /**function for display login */
   public function index();
    
   /**
   * To submit register create new user
   * @param Request $request
   * @return View tasks
   */
   public function postRegistration(Request $request);

}