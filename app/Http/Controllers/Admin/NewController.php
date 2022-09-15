<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\EditNesRequest;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$news = new News();
        $news = News::all();
        //$news = News::paginate(1);
        //dd(News::orderBy('id','desc')->get());
        //dd($news->getNewsById(3));
        return view('admin.news.index',[
            'newsList' => $news/*$news->getNews()*/
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();

        $categories = $category->categoryesId();
        //dd($categories);
        return view('admin.news.create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string']
        ]);
        $news = News::create(
            $request->only(['title', 'author', 'description' , 'category_id' , 'status'])
        );

        if ( $news ) {
            return redirect()
                ->route('admin.news.index')
                ->with( 'success', 'Новость успешно добавлена');
        }

        return back()->with('error', 'Новость не добавилась' );
        //dd($request->query());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(EditNesRequest $request, News $news)
    {
        //$request->validate();

        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->author = $request->input('author');
        $news->category_id = $request->input('category_id');
        $news->status = $request->input('status');

        if ( $news->save() ) {
            return redirect()
                ->route( 'admin.news.index' )
                ->with( 'success', 'Новость успешно обновлена');
        }

        return back()->with('error', 'Новость не обновилась');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
