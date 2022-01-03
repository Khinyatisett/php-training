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
     * To show login view
     *
     * @return response()
     */
    public function index()
    {   
        return view('auth.login');
    }  
      
    /**
     * To show registration view 
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }
      
    /**
     * To submit login user
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
            return redirect()->intended('tasks')->withSuccess('You have Successfully loggedin');
        }      
        return redirect("/")->withSuccess('Oppes! You have entered invalid credentials');
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
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("/")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * To store data from user registration
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    
    /**
    * To show tasks after login
    *
    * @return response()
    */
    public function dashboard()
    {
        if(Auth::check()){
            return view('/tasks');
        }
        return redirect("/")->withSuccess('Opps! You do not have access');
    }

    /**
    * To logout user
    *
    * @return response()
    */
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}