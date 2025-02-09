<?php

namespace App\Helpers;

use App\Models\Patient;

class PatientCreateHelper
{
    public static function patientCreate($patient)
    {
        $patient = Patient::create([
            'first_name' => $patient['first_name'],
            'last_name' => $patient['last_name'],
            'birthdate' => $patient['birthdate'],
            'age' => $patient['age'],
            'age_type' => $patient['age_type'],
        ]);

        // return $patient;
    }
}
