<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ImageMobilSlaid extends Model
{
    use HasFactory;

    // public $timestamps = true;

    protected $table = 'slader_mobil';

    protected $fillable = [
        'image',
        // 'created_at',
        // 'updated_at',
    ];

}
