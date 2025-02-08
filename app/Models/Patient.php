<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';

    protected $fillable = [
        'first_name',
        'last_name',
        'birthdate',
        'age',
        'age_type',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'birthdate' => 'date:d-m-Y',
        ];
    }
}
