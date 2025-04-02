<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Meter;
use App\Models\Address;

class MeterGroup extends Model
{
    use HasFactory;

    protected $table = 'meterGroups';

    protected $fillable = [
        'title', 
    ];

    public function meter(): HasMany
    {
        return $this->hasMany(Meter::class, 'id_group', 'id');
    }

    public function address(): HasMany
    {
        return $this->hasMany(Address::class, 'id_group', 'id');
    }
}
