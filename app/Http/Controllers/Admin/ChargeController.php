<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Charge;
use App\Models\Account;
use App\Models\Tarif;
use App\Http\Requests\CreateChargeRequest;
use \Carbon\Carbon;
use App\Models\Payment;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Account $account, Request $request)
    {
        $account =  Account::with(['address.meterGroup.meter','personal', 'charge.tarif', 'payment',  'Org'])->where("id", "=", $request->account)->paginate(5);
        $page = $request->get('page', 1);
        if ($page > 0) {
            $page = ($page - 1) * 5;
        }

        return view('admin.charges.index', [
            'account' => $account,
            'page' => $page,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tarifs =  Tarif::all();

        return view('admin.charges.create',[
            'tarifs' => $tarifs,
            'accountId' => $request->accountId,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateChargeRequest $request)
    {
        $charge = Charge::create([
            'c_date' => Carbon::createFromFormat('Y-m-d', $request->c_date),
            'id_tarif' => $request->id_tarif,
            'id_account' => $request->accountId,
            'meter' => $request->meter,
        ]);
        $tarif = Tarif::where('id', '=', $request->id_tarif)->get();
        $meter = $request->meter * $tarif[0]->price;
        $payment = Payment::create([
            'id_account' => $request->accountId,
            'p_date' => Carbon::createFromFormat('Y-m-d', $request->c_date), 
            'meter' => $meter,
            'amount' => $request->amount,
        ]);

        if ($charge && $payment) {
            return redirect()
            ->route('admin.charges.index', [
                'account' => $request->accountId, 
            ])
            ->with('success', 'Начисление успешно добавлено');
        }

        return back()->wiht('error', 'Начисление не добавлено');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Charge $charge, Request $request)
    {
        $account =  Account::where("id", "=", $charge->id_account)->get();
        // $tarif =  Account::where("id", "=", $request->account)->get();
        // $charge = Charge::where('id_account', '=', $charge->id)->get();
        $tarifId = Tarif::where('id', '=', $charge->id_tarif)->get()[0]->id;
        $payment = Payment::where('id_account', '=', $account[0]->id)->get();
        $tarifs =  Tarif::all();

        return view('admin.charges.edit', [
            'charge' => $charge,
            'account' => $account,
            'tarifs' => $tarifs,
            'tarifId' => $tarifId,
            'payment' => $payment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Charge $charge, CreateChargeRequest $request)
    {
        // $account =  Account::with(['address.meterGroup.meter','personal', 'charge.tarif', 'payment'])->where("id", "=", $request->account)->paginate(5);
        // $tarifs =  Tarif::all();
        $account =  Account::where("id", "=", $charge->id_account)->get();
        $tarif = Tarif::where('id', '=', $charge->id_tarif)->get();
        $charge = Charge::where('id', '=', $charge->id)->update([ 
            'meter' => $request->meter,
            'c_date' => Carbon::createFromFormat('Y-m-d', $request->c_date),
            'id_tarif' => $request->id_tarif,
        ]);
        $meter = $request->meter * $tarif[0]->price;
        $payment = Payment::where('id_account', '=', $account[0]->id)->update([
            'p_date' => Carbon::createFromFormat('Y-m-d', $request->c_date), 
            'meter' => $meter,
            'amount' => $request->amount,
        ]);

        if( $payment && $charge) {
            return redirect()
            ->route('admin.charges.index', [
                'account' => $account[0]->id, 
            ])
            ->with('success', 'Начисление успешно обновлено')
            /*->with('success', 'Категория Cкуспешно обновлена')*/;
        }

        return back()->wiht('error', 'Начисление не обновивлино');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Charge $charge)
    {
        $charge::destroy($charge->id);
        $account = Account::where('id', '=', $charge->id_account)->get();
        // Account::destroy($account[0]->id);
        $account = Payment::where('id_account', '=', $account[0]->id)->update([
            'meter' => 0,
        ]);
        return redirect()
        ->route('admin.charges.index', [
            'account' => $account, 
        ])
        ->with('success', 'Начисление удалено');
    }
}
