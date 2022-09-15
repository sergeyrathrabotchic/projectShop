<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        
        //return response('Work')->header('Content-Type', 'text/html')/*view('admin.index')*/;
        //return response()->json($request->query());



        return view('admin.index');
        //return response()->json(['name' => 1, 'age' => 2]);
    }
}
