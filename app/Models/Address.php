<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\MeterGroup;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'id_group',
        'street', 
        'house', 
    ];

    public function meterGroup(): BelongsTo
    {
        return $this->belongsTo(MeterGroup::class, 'id_group', 'id');
    }
}
