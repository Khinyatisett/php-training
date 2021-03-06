<?php

namespace App\Services\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Contracts\Services\Auth\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Service class for task.
 */
class AuthService implements AuthServiceInterface
{
    /**
    * task dao
    */
    private $authDao;
    /**
    * Class Constructor
    * @param TaskDaoInterface
    * @return
    */
    public function __construct(AuthDaoInterface $authDao)
    {
        $this->authDao = $authDao;
    }
 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return $this->authDao->index();
    }

    public function registration() 
    {
        return $this->authDao->registration();
    }
    
    /**
   * To submit register create new user
   * @param Request $request
   * @return View tasks
   */
    public function postRegistration(Request $request) {
        return $this->authDao->postRegistration($request);
    }
}