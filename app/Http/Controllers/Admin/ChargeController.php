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
        $account =  Account::with(['address.meterGroup.meter','personal', 'charge.tarif', 'payment'])->where("id", "=", $request->account)->paginate(5);
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
        $payment = Payment::create([
            'id_account' => $request->accountId,
            'p_date' => Carbon::createFromFormat('Y-m-d', $request->c_date), 
            'meter' => 0,
            'amount' => 0,
        ]);

        if ($charge && $payment) {
            return redirect()
            ->route('admin.charges.index')
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
