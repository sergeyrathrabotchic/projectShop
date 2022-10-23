<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ImageSlaid extends Model
{
    use HasFactory;

    // public $timestamps = true;

    protected $table = 'slide';

    protected $fillable = [
        'image',
        // 'created_at',
        // 'updated_at',
    ];

}
