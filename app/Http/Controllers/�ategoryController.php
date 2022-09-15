<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class СategoryController extends Controller
{
    public function index() 
    {
        return view('categories.index', [
            'categoryList' => $this->getСategory(),
        ]);
    }
    
    /*public function show(int $id) 
    {
        $news = $this->getNews()[$id] ?? null;

        if (!$news){
            abort(404);
        }

        return view( 'news.show', [
            'news' => $news,
            'id' => $id
        ]);
    }*/
}