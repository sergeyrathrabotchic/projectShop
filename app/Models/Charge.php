<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Account;
use App\Models\Tarif;

class Charge extends Model
{
    use HasFactory;

    protected $table = 'charges';

    protected $fillable = [
        'id_account',
        'id_tarif', 
        'c_date',
        'meter',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'id_account', 'id');
    }

    public function tarif(): BelongsTo
    {
        return $this->hasMany(Tarif::class, 'id_tarif', 'id');
    }
}
