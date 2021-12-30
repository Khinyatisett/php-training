<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface AuthDaoInterface
{ 
    /**function for display login */
    public function index();
    /**function for register new user */
    public function postRegistration(Request $request);
}