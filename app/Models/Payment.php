<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'id_account',
        'p_date', 
        'meter',
        'amount', 
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'id_account', 'id');
    }
}
