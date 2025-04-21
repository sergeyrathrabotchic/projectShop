<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservoir;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pump extends Model
{
    use HasFactory;

    protected $table = 'pumps';

    protected $fillable = [
        'id_reservoir',
        'pumping_volume', 
        'condition', 
    ];

    public function reservoir(): BelongsTo
    {
        return $this->belongsTo(Reservoir::class, 'id_reservoir', 'id');
    }
}
