<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MeterGroup;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meter extends Model
{
    use HasFactory;

    protected $table = 'meters';

    protected $fillable = [
        'id_group',
        'm_date', 
        'amount', 
    ];

    public function meterGroup(): BelongsTo
    {
        return $this->belongsTo(MeterGroup::class, 'meter_group_id', 'id');
    }
}
