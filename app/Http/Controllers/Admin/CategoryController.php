<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$catigories = Category::whereIn('id',['1','5','7'])->get();
        $catigories = Category::with('news')->paginate(10);
        //$catigories = Category::all();
        //dd($catigories);
        return view('admin.categories.index', [
            'categories' => $catigories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //valldation
        $category = Category::create(
            $request->only(['title','description'])
        );

        if ($category) {
            return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Категория успешно добавлена');
        }

        return back()->wiht('error', 'Категория не добавилась');
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
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       //$category = Category::findOrFail($id);
       return view('admin.categories.edit', [
           'category' => $category
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max250']
        ]);
        //validashin
        //dd($category->id());
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        /*$category = $category->fill(
            $request->only(['title','description'])
        )->save();*/
        if( $category->save() ) {
            return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Категория успешно обновлена')
            /*->with('success', 'Категория успешно обновлена')*/;
        }

        return back()->wiht('error', 'Категория не обновилась');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
