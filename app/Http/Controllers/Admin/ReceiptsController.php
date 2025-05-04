<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
// use App\Models\Address;
use App\Models\Account;
use Illuminate\Contracts\Database\Eloquent\Builder;
use \Carbon\Carbon;


class ReceiptsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $addresses =  Address::with('meterGroup.meter')->paginate(5);
        $accounts =  Account::with('personal','payment','charge')->has('payment', '>', 0)->has('charge', '>', 0)->paginate(5);
        // $accounts =  Account::with(['personal','payment'=> function (Builder $query) {
        //     $query->where('p_date', '=',Carbon::now()->subDays(7));
        // },'charge.tarif'=> function (Builder $query) {
        //     $query->where('c_date', '=',Carbon::now()->subDays(7));
        // }])->has('payment', '>', 0)->has('charge', '>', 0)->paginate(5);
        // dd($accounts);
        // $pumps =  Pump::all();
        $arrDifference = [];
        $arrAmountSum = [];
        $arrMeterSum = [];
        $arrMeterSumCharge = [];
        foreach ($accounts as $account) {
            $meterSum = 0;
            $amountSum = 0;
            $meterChargeSum = 0;
            // foreach ($account->payment as $payment){
            //     $meterSum = $meterSum + $payment->meter;
            //     $amountSum = $amountSum + $payment->amount;
            // }
            // dd($amountSum);           
            // $arrDifference[] =  -($amountSum - $meterSum) ;
            foreach ($account->payment->where('p_date', '>',Carbon::now()->subDays(7)) as $payment){
                $meterSum = $meterSum + $payment->meter;
                $amountSum = $amountSum + $payment->amount;
            }

            foreach ($account->charge->where('c_date', '>',Carbon::now()->subDays(7)) as $charge){
                $meterChargeSum = $meterChargeSum+ $charge->meter;
            }

            $arrAmountSum[] = [$account->id => $amountSum];
            $arrMeterSum[] = [$account->id => $meterSum];
            $arrMeterSumCharge[] = [$account->id => $meterChargeSum];
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
        return view('admin.receipts.index', [
            'accounts' => $accounts,
            'arrMeterSumCharge' => $arrMeterSumCharge,
            'page' => $page,
            'arrAmountSum' => $arrAmountSum,
            'arrMeterSum' => $arrMeterSum,
            'param' => $param,
        ]);
    }
}
