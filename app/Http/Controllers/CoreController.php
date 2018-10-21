<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class CoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch(Route::getCurrentRoute()->getPath()){
            case 'users':
            {
                return view('users');
            }
            case 'login':
                {
                    return view('auth.login');
                }
        }
       // dd(Route::getCurrentRoute()->getPath());
       // return view('home');
    }
}
