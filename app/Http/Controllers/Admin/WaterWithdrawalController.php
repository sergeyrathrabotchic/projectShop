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
        $pumps =  Pump::all();

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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservoir $reservoir, Request $request)
    {
       // $address = $address::with('meterGroup.meter');
    //    $pump = Pump::where('id', '=', $pump->id)->get();
        $reservoir = Reservoir::where('id','=',$request->reservoir)->get()[0];
        return view('admin.reservoirs.edit', [
            'reservoir' => $reservoir,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservoir $reservoir)
    {
        $reservoir = $reservoir->update([
            'max_volume' => $request->max_volume,
            'current_volume' => $request->current_volume,
        ]);
        if( $reservoir) {
            return redirect()
            ->route('admin.reservoirs.index')
            ->with('reservoirs', 'Резервуар успешно обновлена')
            /*->with('success', 'Категория успешно обновлена')*/;
        }

        return back()->wiht('error', 'Резервуар не обновилсась');
    }
}
