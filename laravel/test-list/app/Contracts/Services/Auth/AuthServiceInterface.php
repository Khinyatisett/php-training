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
    /**function for register new user */
   public function postRegistration(Request $request);

}