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

        $accounts =  Account::with('personal','payment')->has('payment', '>', 0)->paginate(5);
        // $pumps =  Pump::all();
        $arrDifference = [];
        $arrAmountSum = [];
        $arrMeterSum = [];
        foreach ($accounts as $account) {
            $meterSum = 0;
            $amountSum = 0;
            foreach ($account->payment as $payment){
                $meterSum = $meterSum + $payment->meter;
                $amountSum = $amountSum + $payment->amount;
            }
            // dd($amountSum);           
            $arrDifference[] =  -($amountSum - $meterSum) ;
            $arrAmountSum[] = $amountSum;
            $arrMeterSum[] = $meterSum;
            // $account->payment = $result;
        };
        if(!$request->param){
            $param = 0;
        } else if ($request->param == 1){
            $param = 1;
        } else if ($request->param == 2){
            $param = 2;
        }
        
        // dd($arrDifference);
        // if ($request->param){
        //     if ($request->param == 1){
        //         $arrDifferenceC = $arrDifference;
        //         for ($i = 0;$i < count($arrDifference);$i++){
        //             if ($arrDifference[$i] < 0 ){
        //                 $account->payment->forget($i);
        //             };
        //         };
        //     } else if ($request->param == 1) {
        //         foreach ($account->payment->meter as $meter){
        //             if ($meter->difference > 0 ){
        //                 $account->payment->forget($meter->id);
        //             };
        //         };
        //     }
        // }

        $page = $request->get('page', 1);
        if ($page > 0) {
            $page = ($page - 1) * 5;
        }
        // dd($accounts);
        return view('admin.overpayments.index', [
            'accounts' => $accounts,
            'arrDifference' => $arrDifference,
            'page' => $page,
            'arrAmountSum' => $arrAmountSum,
            'arrMeterSum' => $arrMeterSum,
            'param' => $param,
        ]);
    }
}
