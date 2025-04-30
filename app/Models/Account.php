<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Personal;
use App\Models\Address;
use App\Models\Charge;
use App\Models\Payment;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    protected $fillable = [
        'id',
        'id_group',
        'account', 
    ];

    public function personal(): HasMany
    {
        return $this->hasMany(Personal::class, 'id_account', 'id');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'id_group', 'id');
    }

    public function charge(): HasMany
    {
        return $this->hasMany(Charge::class, 'id_account', 'id');
    }

    public function payment(): HasMany
    {
        return $this->hasMany(Payment::class, 'id_account', 'id');
    }
}
