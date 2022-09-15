<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    /*protected $fillable = [
        'title', 'author', 'description', 'category_id', 'status' 
    ]; или можно использовать $guarded, он разрешает обновлять все поля кроме тех которые указаны*/
    protected $fillable = [
        'title', 'author', 'description', 'category_id', 'status' 
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    // public function getNews()
    // {
    //     $request = new Request();
    // /*dd(
    //         DB::table($this->table)
    //             ->join('categories', 'news.category_id' ,'=', 'categories.id')
    //             ->select("news.*", "categories.title as categoryTitle")
    //             ->where('news.title', 'like', '%' . $request->get('s').'%')
    //             ->toSql()
    //             //->toSql()
    // );*/
    // return DB::table($this->table)
    //         ->whereBetween('id',[1,10])
    //         ->select('id', 'title', 'author', 'description')
    //         //->orderBy('id', 'desc')
    //         ->get();
    // }

    /*public function getNewsById(int $id)
    {
        return DB::table($this->table)->find($id);
    }*/
}
