<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Org extends Model
{
    use HasFactory;

    protected $table = 'orgs';

    protected $fillable = [
        'id_account',
        'title', 
        'office',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'id_account', 'id');
    }
}
