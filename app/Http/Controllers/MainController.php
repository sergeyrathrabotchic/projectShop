<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ImageSlaid;
use App\Models\ImageMobilSlaid;


class MainController extends Controller
{
    public function index() 
    {
        //dd(DB::table('users')->find(1));
        // $slides = ImageSlaid::all();
        // $slideMobils = ImageMobilSlaid::all();
        //dd($_POST['width']);
        // return view('main.index', [
        //     'slides' => $slides,
        //     'slideMobils' => $slideMobils,
        // ]);
        // return view('admin.index');
        return redirect()
            ->route('admin.index');
    }
    
}