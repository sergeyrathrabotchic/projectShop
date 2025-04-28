<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personals';

    protected $fillable = [
        'id_account',
        'FIO', 
        'sub_addr', 
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'id_account', 'id');
    }
}
