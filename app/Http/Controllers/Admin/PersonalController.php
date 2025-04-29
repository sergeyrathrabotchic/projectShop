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
    public function show(Personal $personal)
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        $account = Account::where('id', '=', $personal->id_account)->get();
        // dd($account);
        $addresId = Address::where('id', '=', $account[0]->id_group)->get();
        // dd($addresId);
        $addresses = Address::all();
        return view('admin.personals.edit', [
            'personal' => $personal,
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
    public function update(CreatePersonalRequest $request, Personal $personal)
    {
        $personalUpdate = $personal->update([
            'FIO' => $request->FIO,
            'sub_addr' => $request->sub_addr,
        ]);
        $account = Account::where('id', '=', $personal->id_account)->update([
            'id_group' => $request->address_id,
            'account' => $request->FIO ,
        ]);
        // $accountUpdate = Account::update([
        //     'id_group' => $request->address_id,
        //     'account' => $request->FIO ,
        // ]);
        if( $personalUpdate && $account) {
            return redirect()
            ->route('admin.personals.index')
            ->with('success', 'Физическое лицо успешно обновлено')
            /*->with('success', 'Категория Cкуспешно обновлена')*/;
        }

        return back()->wiht('error', 'Физическое лицо не обновивлино');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        $personal::destroy($personal->id);
        $account = Account::where('id', '=', $personal->id_account)->get();
        Account::destroy($account[0]->id);
        return redirect()
        ->route('admin.personals.index')
        ->with('success', 'Физическое лицо успешно удалено');
    
    }
}
