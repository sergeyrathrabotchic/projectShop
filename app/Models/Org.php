<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    use HasFactory;

    protected $table = 'orgs';

    protected $fillable = [
        'id_account',
        'title', 
        'office',
    ];
}
