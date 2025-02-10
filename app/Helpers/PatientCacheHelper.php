<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use \Carbon\Carbon;

class PatientCacheHelper
{
    public static function patientCache($request)
    {
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

        return $patient;
    }
}
