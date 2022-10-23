<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ImageSlaid;


class MainController extends Controller
{
    public function index() 
    {
        //dd(DB::table('users')->find(1));
        $slides = ImageSlaid::all();
        return view('main.index', [
            'slides' => $slides,
        ]);
    }
    
}