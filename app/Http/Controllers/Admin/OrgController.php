<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Charge;
use App\Models\Account;
use App\Models\Tarif;
use App\Http\Requests\CreateOrgRequest;
use \Carbon\Carbon;
use App\Models\Payment;
use App\Models\Org;
use App\Models\Address;

class OrgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Account $account, Request $request)
    {
        if ($request->office) {
            $orgs =  Org::where('office','=',$request->office)->with('account.address.meterGroup.meter')->get();
            $orgs =  Org::whereIN('id', $orgs->pluck('id')->toArray())->with('account.address.meterGroup.meter')
                ->paginate(5)->appends(['office' => $request->office]);
            $page = $request->get('page', 1);
            if ($page > 0) {
                $page = ($page - 1) * 5;
            } 
            // dd(1);
        } else if ($request->title){
            $orgs =  Org::where('title','=',$request->title)->with('account.address.meterGroup.meter')->get();
            $orgs =  Org::whereIN('id', $orgs->pluck('id')->toArray())->with('account.address.meterGroup.meter')
                ->paginate(5)->appends(['title' => $request->title]);
            $page = $request->get('page', 1);
            if ($page > 0) {
                $page = ($page - 1) * 5;
            } 
            // dd(1);
        } else if ($request->street){
            
            $orgs =  Org::with('account.address.meterGroup.meter')->get();
            // dd($orgs->count());
            $forget = [];
            for ($i = 0; $i < $orgs->count(); $i++) {
                if ($orgs[$i]->account->address->street != $request->street) {
                    // dd(1);
                    $forget[]= $i;
                    // $orgs->forget($i);
                }  
            }
            foreach ($forget as $i) {
                $orgs->forget($i);
            }
            $orgs =  Org::whereIN('id', $orgs->pluck('id')->toArray())->with('account.address.meterGroup.meter')
                ->paginate(5)->appends(['street' => $request->street]);

            $page = $request->get('page', 1);
            if ($page > 0) {
                $page = ($page - 1) * 5;
            }

        }else {
            $orgs =  Org::with('account.address.meterGroup.meter')->paginate(5);
            $page = $request->get('page', 1);
            if ($page > 0) {
                $page = ($page - 1) * 5;
            } 
        }
        
        return view('admin.orgs.index', [
            'orgs' => $orgs,
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
        $addresses =  Address::all();

        return view('admin.orgs.create',[
            'addresses' => $addresses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrgRequest $request)
    {
        $account = Account::create([
            'id_group' => $request->address_id,
            'account' => $request->office ,
        ]);
        $org = Org::create([
            'id_account' => $account->id,
            'office' => $request->office,
            'title' => $request->title,
        ]);

        if ($org && $account) {
            return redirect()
            ->route('admin.orgs.index')
            ->with('success', 'Юридическое лицо успешно добавлено');
        }

        return back()->wiht('error', 'Юридическое лицо не добавлено');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Org $org, Request $request)
    {
        $orgs =  Org::with('account.address.meterGroup.meter')->where("id", "=", $org->id)->paginate(5);
        $page = $request->get('page', 1);
        if ($page > 0) {
            $page = ($page - 1) * 5;
        }

        return view('admin.orgs.show', [
            'orgs' => $orgs,
            'page' => $page,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Org $org, Request $request)
    {
        $account = Account::where('id', '=', $org->id_account)->get();
        // dd($account);
        $addresId = Address::where('id', '=', $account[0]->id_group)->get();
        // dd($addresId);
        $addresses = Address::all();
        return view('admin.orgs.edit', [
            'org' => $org,
            'account' => $account,
            'addresId' => $addresId,
            'addresses' => $addresses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOrgRequest $request, Org $org)
    {
        $orgUpdate = $org->update([
            'office' => $request->office,
            'title' => $request->title,
        ]);
        $account = Account::where('id', '=', $org->id_account)->update([
            'id_group' => $request->address_id,
            'account' => $request->office ,
        ]);
        // $accountUpdate = Account::update([
        //     'id_group' => $request->address_id,
        //     'account' => $request->FIO ,
        // ]);
        if( $orgUpdate && $account) {
            return redirect()
            ->route('admin.orgs.index')
            ->with('success', 'Юридическое лицо успешно обновлено')
            /*->with('success', 'Категория Cкуспешно обновлена')*/;
        }

        return back()->wiht('error', 'Юридическое лицо не обновивлино');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Org $org)
    {
        $org::destroy($org->id);
        $account = Account::where('id', '=', $org->id_account)->get();
        Account::destroy($account[0]->id);
        return redirect()
        ->route('admin.orgs.index')
        ->with('success', 'Юридическое лицо успешно удалено');
    }
}
