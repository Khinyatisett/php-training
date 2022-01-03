<?php

namespace App\Dao\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Contracts\Services\Auth\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

/**
 * Service class for task.
 */
class AuthDao implements AuthDaoInterface
{
    /**Function for view login */
    public function index(){
        $auth = $this->authInterface->index();
    }

    /**
   * To submit register create new user
   * @param Request $request
   * @return View tasks
   */
    public function postRegistration(Request $request) {
        $data = $request->all();
        $check = $this->create($data);
    }
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

}