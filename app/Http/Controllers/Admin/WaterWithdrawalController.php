<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
// use App\Models\Address;
use App\Models\Reservoir;
use App\Models\Pump;


class WaterWithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $addresses =  Address::with('meterGroup.meter')->paginate(5);
        $reservoirs =  Reservoir::with('pump')->paginate(2);
        $pumps =  Pump::with('pump')->paginate(2);

        $page = $request->get('page', 1);
        if ($page > 0) {
            $page = ($page - 1) * 5;
        }

        return view('admin.waterWithdrawals.index', [
            'reservoirs' => $reservoirs ,
            'pumps' => $pumps ,
            'page' => $page,
        ]);
    }
}
