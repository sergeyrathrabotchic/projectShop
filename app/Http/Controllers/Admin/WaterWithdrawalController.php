<?php

namespace App\Http\Admin\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Address;

class WaterWithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $addresses =  Address::with('meterGroup.meter')->paginate(5);
        $page = $request->get('page', 1);
        if ($page > 0) {
            $page = ($page - 1) * 5;
        }
        // dd($address->meterGroup->meter);
        //dd($electroplatings);
        //$catigories = Category::all();
        //dd($catigories);
        // dd(ImageSlaid::all());
        // dd($slideImages);
        // dd(1);
        return view('admin.waterWithdrawals.index', [
            'addresses' => $addresses ,
            'page' => $page,
        ]);
    }
}
