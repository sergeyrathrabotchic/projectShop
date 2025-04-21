<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Pump;

class Reservoir extends Model
{
    use HasFactory;

    protected $table = 'reservoirs';

    protected $fillable = [
        'time_filling',
        'time_leakage',
        'max_volume',
        'current_volume', 
    ];

    public function pump(): HasMany
    {
        return $this->hasMany(Pump::class, 'id_reservoir', 'id');
    }

}
