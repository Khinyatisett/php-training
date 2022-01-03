<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface AuthDaoInterface
{ 
    /**
     * To show login view
     *
     * @return response()
     */
    public function index();

    /**
     * To show registration view 
     *
     * @return response()
     */
    public function registration();
    
    /**
    * To submit register create new user
    * @param Request $request
    * @return View tasks
    */
    public function postRegistration(Request $request);
}