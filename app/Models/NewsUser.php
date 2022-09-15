<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewsUser extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNewsUser()
    {
        $request = new Request();
        /*dd(
            DB::table($this->table)
                ->join('categories', 'news.category_id' ,'=', 'categories.id')
                ->select("news.*", "categories.title as categoryTitle")
                ->where('news.title', 'like', '%' . $request->get('s').'%')
                ->toSql()
                //->toSql()
        );*/
        return DB::table($this->table)
            ->whereBetween('id',[1,10])
            ->select('id', 'title', 'author', 'description' ,'category_id')
            ->orderBy('id', 'desc')
            
            ->get()->toArray();
    }


}