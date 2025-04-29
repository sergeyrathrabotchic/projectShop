<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Address;
use App\Models\Account;
use App\Http\Requests\CreatePersonalRequest;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $personals =  Personal::with('account.address.meterGroup.meter')->paginate(5);
        $page = $request->get('page', 1);
        if ($page > 0) {
            $page = ($page - 1) * 5;
        }

        return view('admin.personals.index', [
            'personals' => $personals,
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
        $addresses =  address::all();

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
    public function store(CreatePersonalRequest $request)
    {
        $account = Account::create([
            'id_group' => $request->address_id,
            'account' => $request->FIO ,
        ]);
        $personal = Personal::create([
            'id_account' => $account->id,
            'FIO' => $request->FIO,
            'sub_addr' => $request->sub_addr,
        ]);

        if ($personal && $account) {
            return redirect()
            ->route('admin.personals.index')
            ->with('success', 'Физическое лицо успешно добавлено');
        }

        return back()->wiht('error', 'Физическое лицо не добавлено');
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
    public function edit(Personal $personal)
    {
        $account = Account::where('id', '=', $personal->id_account);
        $addres = Address::where('id', '=', $account->id);
        return view('admin.personals.edit', [
            'personal' => $personal,
            'account' => $account,
            'addres' => $addres,
        ]);
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
