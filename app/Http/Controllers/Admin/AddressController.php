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
            ->with('success', 'Адресс успешно добавлен');
        }

        return back()->wiht('error', 'Адресс не добавлен');
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
    public function edit(Address $address)
    {
        // $address = $address::with('meterGroup.meter');
        $meterGroup = MeterGroup::where('id', '=', $address->id_group)->with('meter')->get();
        return view('admin.addresses.edit', [
            'address' => $address,
            'meterGroup' => $meterGroup,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAddressRequest $request, Address $address)
    {
        $addressResult = $address->update([
            'street' => $request->street,
            'house' => $request->house,
        ]);
        $meterGroup = MeterGroup::where('id','=', $address->id_group);
        $meterGroupResult = $meterGroup->update([
            'title' => $request->title,
        ]);
        $meterGroup = $meterGroup->get()[0];
        $meter = Meter::where('id_group','=', $meterGroup->id);
        $meterResult = $meter->update([
            'amount' => $request->amount,
            'm_date' => Carbon::now()->format('Y-m-d')
        ]);


        if( $addressResult && $meterGroupResult && $meterResult) {
            return redirect()
            ->route('admin.addresses.index')
            ->with('success', 'Адресс успешно обновлен')
            /*->with('success', 'Категория успешно обновлена')*/;
        }

        return back()->wiht('error', 'Адресс не обновилсяы');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address::destroy($address->id);
        $meterGroup = MeterGroup::where('id', '=',  $address->id_group)->get()[0];
        $meter = Meter::where('id_group', '=',  $meterGroup->id)->get()[0];
        MeterGroup::destroy($meterGroup->id);
        Meter::destroy($meter->id);
        // $meterGroup = $meterGroup::where('id', '=',  $meterGroup->id)->destroy();
        // $meter = $meter::where('id', '=',  $meter->id)->destroy();

        return redirect()
        ->route('admin.addresses.index')
        ->with('success', 'Адресс успешно удален');
    }
}
