<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Pump;
use App\Http\Requests\CreatePumpRequest;


class PumpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pumps =  Pump::paginate(5);
        $page = $request->get('page', 1);
        if ($page > 0) {
            $page = ($page - 1) * 5;
        }

        return view('admin.pumps.index', [
            'pumps' => $pumps ,
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
        return view('admin.pumps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePumpRequest $request)
    {

        $pump = Pump::create([
            'id_reservoir' => $request->id_reservoir,
            'pumping_volume' => $request->pumping_volume,
            'condition' => $request->condition,
        ]);

        if ($pump) {
            return redirect()
            ->route('admin.pumps.index')
            ->with('success', 'Cкважина с насосом успешно добавлена');
        }

        return back()->wiht('error', 'Cкважина с насосом не добавлена');
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
    public function edit(Pump $pump)
    {
       // $address = $address::with('meterGroup.meter');
    //    $pump = Pump::where('id', '=', $pump->id)->get();

       return view('admin.pumps.edit', [
           'pump' => $pump,
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePumpRequest $request, Pump $pump)
    {
        $pump = $pump->update([
            'id_reservoir' => $request->id_reservoir,
            'pumping_volume' => $request->pumping_volume,
            'condition' => $request->condition,
        ]);
        if( $pump) {
            return redirect()
            ->route('admin.pumps.index')
            ->with('pumps', 'Cкважина с насосом успешно обновлена')
            /*->with('success', 'Категория успешно обновлена')*/;
        }

        return back()->wiht('error', 'Cкважина с насосом не обновилсась');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Pump $pump)
    {
        $pump::destroy($pump->id);
        return redirect()
        ->route('admin.pumps.index')
        ->with('success', 'Cкважина с насосом успешно удалена');
    }
}
