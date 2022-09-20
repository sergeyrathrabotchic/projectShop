<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    public function index() 
    {
        //dd(DB::table('users')->find(1));
        return view('main.index');
    }
    
}