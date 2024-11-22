<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ProductImages;


class Ceramics extends Model
{
    use HasFactory;

    // public $timestamps = true;

    protected $table = 'ceramics';

    protected $fillable = [
        'name',
        'price',
        'description',
        'created_at',
        'updated_at',
    ];

    public function productImage(): HasMany
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }

}
