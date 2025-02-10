<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Jobs\PatientJob;
use App\Http\Requests\CreatePatientRequest;
use App\Helpers\PatientCacheHelper;

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
    public function store(CreatePatientRequest $request)
    {

        $patient = PatientCacheHelper::patientCache($request);

        dispatch((new PatientJob($patient))->delay(Carbon::now()->addSecond(30)));

        if ($patient) {
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
