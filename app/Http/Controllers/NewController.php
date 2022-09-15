<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\СategoryController;
use App\Models\News;

class NewController extends Controller
{
    public function index() 
    {
        //dd($this->getNews());
        /*$ategoryController = new СategoryController();
        $category =$ategoryController->getСategory();
        echo '<pre>'; 
        print_r($category); 
        echo '</pre>';*/
        return view('news.index', [
            'newsList' => News::all()/*$this->getNews()*/,
        ]);
    }
    
    public function show(int $id) 
    {
        $news = $this->getNews()[$id] ?? null;

        if (!$news){
            abort(404);
        }

        return view( 'news.show', [
            'news' => $news,
            'id' => $id
        ]);
    }
}
