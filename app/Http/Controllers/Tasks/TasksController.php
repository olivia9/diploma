<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{

    public function index(){

    }

    public function getTasks(){
        echo "hello";
      // var_dump( Auth::user());
      //  echo Auth::user();
    }
}
