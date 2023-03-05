<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Electroplating;


class ProductImages extends Model
{
    use HasFactory;

    // public $timestamps = true;

    protected $table = 'product_images';

    protected $fillable = [
        'image',
        'product_id',
        'type',
        'created_at',
        'updated_at',
    ];

    public function electroplating(): BelongsTo
    {
        return $this->belongsTo(Electroplating::class, 'product_id', 'id');
    }

}
