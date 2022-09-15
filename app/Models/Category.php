<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'title', 'description'
    ];

    public function categoryesId() {
       return DB::table($this->table)->select('id','title')->get();
    }

    public function news(): HasMany
     {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}
