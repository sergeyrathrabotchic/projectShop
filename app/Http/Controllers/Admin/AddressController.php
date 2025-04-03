<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\MeterGroup;
use App\Models\Meter;
use App\Http\Requests\CreateAddressRequest;
use \Carbon\Carbon;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $addresses =  Address::with('address.meterGroup.meter')->paginate(5);
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
        return view('admin.addresses.index', [
            'addresses' => $addresses ,
            'page' => $page,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAddressRequest $request)
    {
        $meterGroup = MeterGroup::create([
            'title' => $request->title,
        ]);
        $Meter = Meter::create([
            'id_group' => $meterGroup->id,
            'amount' => $request->amount,
            'm_date' => Carbon::now()->format('Y-m-d')
        ]);
        $address = Address::create([
            'id_group' => $meterGroup->id,
            'street' => $request->street,
            'house' => $request->house,
        ]);

        if ($meterGroup && $Meter && $address) {
            return redirect()
            ->route('admin.addresses.index')
            ->with('success', 'Товар успешно добавлен');
        }

        return back()->wiht('error', 'Товар не добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
