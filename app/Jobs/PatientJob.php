<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Helpers\PatientCreateHelper;

class PatientJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $patient;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->patient = $patient; 
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PatientCreateHelper $patientCreate)
    {
        $patientCreate->patientCreate($patient);
        // $patientCreate->patientCreate($patient, $age, $age_type)->start();
    }
}
