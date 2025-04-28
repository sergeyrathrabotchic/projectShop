<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Personal;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    protected $fillable = [
        'id_group',
        'account', 
    ];

    public function pump(): HasMany
    {
        return $this->hasMany(Personal::class, 'id_account', 'id');
    }
}
