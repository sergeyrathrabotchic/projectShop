<?php

namespace App\Helpers;

use App\Models\Patient;
use Illuminate\Support\Facades\Cache;
use \Carbon\Carbon;

class PatientCreateHelper
{
    public static function patientCreate($patient)
    {
        $patient = Patient::create([
            'first_name' => $patient['first_name'],
            'last_name' => $patient['last_name'],
            'birthdate' => Carbon::parse($patient['birthdate'])->format("Y-m-d"),
            'age' => $patient['age'],
            'age_type' => $patient['age_type'],
        ]);
        if (Cache::has('patientsCache')){
            $patientsCache = Cache::get('patientsCache');
            $patientsCache = array_splice($patientsCache, $patient['id'], 1);
            Cache::put('patientsCache', $patientsCache, now()->addMinutes(5));
        }

        // return $patient;
    }
}
