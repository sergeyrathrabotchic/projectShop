<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Jobs\PatientJob;
use App\Helpers\PatientCreateHelper;

use function PHPSTORM_META\type;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::paginate(5);
        if (Cache::has('patientsCache')) {
            $patientsCache = Cache::get('patientsCache');
        } else {
            $patientsCache = null;
        }
        return view('admin.patients.index', [
            'patients' => $patients,
            'patientsCache' => $patientsCache
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required','max:191'],
            'last_name' => ['required','max:191'],
            'birthdate' => ['required','date']
        ]);
        $date = Carbon::now();
        $interval = $date->diff($request->birthdate);

        if ($interval->y > 0) {
            $age = $interval->y;
            $age_type = "год";
        } else if ($interval->m > 0) {
            $age = $interval->m;
            $age_type = "месяц";
        } else {
            $age = $interval->d;
            $age_type = "день";
        }


        if (Cache::has('patientsCache')) {
            $patientsCache = Cache::get('patientsCache');
            $patientsCache[] = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'birthdate' => Carbon::parse( $request->birthdate)->format('d-m-Y'),
                'age' => $age,
                'age_type' => $age_type,
            ]; 
            $patientsCache = Cache::put('patientsCache',$patientsCache, now()->addMinutes(5));
        } else { 
            $patientsCache = Cache::put('patientsCache', [[
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'birthdate' =>Carbon::parse( $request->birthdate)->format('d-m-Y'),
                'age' => $age,
                'age_type' => $age_type,
            ]], now()->addMinutes(5));
        }
        $patientsCache = Cache::get('patientsCache');
        $patient = $patientsCache[count($patientsCache)-1];
        $patient['id'] = count($patientsCache)-1;

        dispatch((new PatientJob($patient))->delay(Carbon::now()->addSecond(30)));

        if ($patientsCache) {
            return redirect()
            ->route('admin.patients.index')
            ->with('success', 'Пациент успешно добавлен');
        }

        return back()->wiht('error', 'Пациаент не добавлен');
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
