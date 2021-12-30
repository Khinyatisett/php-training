<?php
  
namespace App\Http\Controllers\Auth;

use App\Contracts\Services\Auth\AuthServiceInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
  
class AuthController extends Controller
{
    public function __construct(AuthServiceInterface $authServiceInterface)
    {
      $this->authInterface = $authServiceInterface;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {   
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('tasks')
                        ->withSuccess('You have Successfully loggedin');
        }
        
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
      
    /**
   * To submit register create new user
   * @param Request $request
   * @return View tasks
   */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        return redirect("/tasks")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('/tasks');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}