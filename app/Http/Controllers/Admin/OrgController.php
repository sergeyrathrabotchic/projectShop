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

class OrgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Account $account, Request $request)
    {
        $orgs =  Org::with('account.address.meterGroup.meter')->paginate(5);
        $page = $request->get('page', 1);
        if ($page > 0) {
            $page = ($page - 1) * 5;
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

        return view('admin.personals.create',[
            'addresses' => $addresses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(CreateOrgRequest $request)
    {
        $account = Account::create([
            'id_group' => $request->address_id,
            'account' => $request->FIO ,
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
