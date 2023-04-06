<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ProductImages;


class MagicOfPolymer
 extends Model
{
    use HasFactory;

    // public $timestamps = true;

    protected $table = 'magic_of_polymers';

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
