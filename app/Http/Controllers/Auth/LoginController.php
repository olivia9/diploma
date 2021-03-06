<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
//      /  session_start();
    }
    public function index()
    {
        $_SESSION['idUser'] = null;
        if(!isset($_SESSION['idUser']))
           return view('auth.login');
        else
          return redirect('/home');
    }

    /*public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        if(User::where('email', $email)->where('password', $password)->count()){
            $_SESSION['idUser'] = User::where('email', $email)->where('password', $password)->first()->id;
           return redirect('/home');
        }
        return redirect('/login');
    }*/
}
