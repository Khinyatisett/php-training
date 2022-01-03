<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface AuthDaoInterface
{ 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index();
    
    /**
    * To submit register create new user
    * @param Request $request
    * @return View tasks
    */
    public function postRegistration(Request $request);
}