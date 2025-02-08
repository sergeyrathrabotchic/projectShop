<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;

    protected $table = 'atients';

    protected $fillable = [
        'first_name',
        'last_name',
        'birthdate',
        'age',
        'age_type',
        'created_at',
        'updated_at',
    ];
}
