<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
// use App\Models\Address;
use App\Models\Account;


class OverpaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $addresses =  Address::with('meterGroup.meter')->paginate(5);

        $accounts =  Account::with('personal','payment')->paginate(2);
        // $pumps =  Pump::all();
        foreach ($accounts as $account) {
            $meterSum = 0;
            $amounSum = 0;
            foreach ($account->payment->meter as $meter){
                $meterSum = $meterSum+ $account->payment->meter;
                $amounSum = $amounSum + $account->payment->amoun;
            }           
            $account->payment->put('difference',  $amounSum - $meterSum );
        };
        if ($request->param){
            if ($request->param == 1){
                foreach ($account->payment->meter as $meter){
                    if ($meter->difference < 0 ){
                        $account->payment->forget($meter->id);
                    };
                };
            } else if ($request->param == 1) {
                foreach ($account->payment->meter as $meter){
                    if ($meter->difference > 0 ){
                        $account->payment->forget($meter->id);
                    };
                };
            }
        }

        $page = $request->get('page', 1);
        if ($page > 0) {
            $page = ($page - 1) * 5;
        }
        dd($accounts);
        return view('admin.overpayments.index', [
            'accounts' => $accounts,
        ]);
    }
}
