<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageSlaid;
use App\Helpers\ImageUploadHelper;
use App\Models\MagicOfStonesAndBead;
use App\Models\ProductImages;


class MagicOfStonesAndBeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$catigories = Category::whereIn('id',['1','5','7'])->get();
        // $slideImages = ImageSlaid::with('image')->paginate(10);


        $ceramics =  MagicOfStonesAndBead::with('productImage')->get()->reverse();
        //dd($ceramics);
        //$ceramics =  Сeramics::all();
        //->paginate(5);
        $page = $request->get('page', 1);
        if ($page > 0) {
            $page = ($page - 1) * 5;
        }
        //dd($electroplatings);
        //$catigories = Category::all();
        //dd($catigories);
        // dd(ImageSlaid::all());
        // dd($slideImages);
        // dd(1);
        return view('magicOfStonesAndBead.index', [
            'ceramics' => $ceramics ,
            'page' => $page,
        ]);
    }

    
}
