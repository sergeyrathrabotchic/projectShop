<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarif;
use App\Http\Requests\CreateTarifRequest;
use \Carbon\Carbon;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tarisfs = Tarif::all()->paginate(5);
        $page = $request->get('page', 1);
        if ($page > 0) {
            $page = ($page - 1) * 5;
        }

        return view('admin.tarisfs.index', [
            'tarisfs' => $tarisfs,
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
        return view('admin.tarisfs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTarifRequest $request)
    {
        $tarifs = Tarif::create([
            'in_date' => Carbon::now()->format('Y-m-d'),
            'title' => $request->title,
            'price' => $request->price,
        ]);
        if ($tarifs) {
            return redirect()
            ->route('admin.tarifs.index')
            ->with('success', 'Тариф успешно добавлен');
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
