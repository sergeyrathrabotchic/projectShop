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
        $tarifs = Tarif::paginate(5);
        $page = $request->get('page', 1);
        if ($page > 0) {
            $page = ($page - 1) * 5;
        }

        return view('admin.tarifs.index', [
            'tarifs' => $tarifs,
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
        return view('admin.tarifs.create');
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

        return back()->wiht('error', 'Адрес не добавлен');
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
    public function edit(Tarif $tarif)
    {
        return view('admin.tarifs.edit', [
            'tarif' => $tarif,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTarifRequest $request, Tarif $tarif)
    {
        $tarifResult = $tarif->update([
            'in_date' => Carbon::now()->format('Y-m-d'),
            'title' => $request->title,
            'price' => $request->price,
        ]);
        


        if( $tarifResult) {
            return redirect()
            ->route('admin.tarifs.index')
            ->with('success', 'Тариф успешно обновлен')
            /*->with('success', 'Категория успешно обновлена')*/;
        }

        return back()->wiht('error', 'Тариф не обновилсяы');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarif $tarif)
    {
        $tarif::destroy($tarif->id);
       

        return redirect()
        ->route('admin.tarifs.index')
        ->with('success', 'Адрес успешно тариф');
    }
}
