<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageSlaid;
use App\Helpers\ImageUploadHelper;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$catigories = Category::whereIn('id',['1','5','7'])->get();
        // $slideImages = ImageSlaid::with('image')->paginate(10);


        $slides =  ImageSlaid::paginate(5);
        $page = $request->get('page', 1);
        if ($page > 0) {
            $page = ($page - 1) * 5;
        }
        //$catigories = Category::all();
        //dd($catigories);
        // dd(ImageSlaid::all());
        // dd($slideImages);
        // dd(1);
        return view('admin.slide.index', [
            'slides' => $slides,
            'page' => $page,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
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

        // dd($request->file());     
        $request->validate([
            'image' => ['required', 'mimes:jpg,jpeg,png']
        ]);


        // if (isset())
        // dd($request->file());
        // dd($request->image);
        $image = ImageUploadHelper::imageUpload($request->image);
        // dd( $request->only(['image']));
        // $mageSlaid = ImageSlaid::insert(
        //     [
        //         1 => [
        //             "image" => $image,
        //         ],
        //     ]
        // );

        $mageSlaid = ImageSlaid::create([
            "image" => $image,
        ]);

        if ($mageSlaid) {
            return redirect()
            ->route('admin.slides.index')
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
        // dd(1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageSlaid $slide)
    {
       //$category = Category::findOrFail($id);
       return view('admin.slide.edit', [
           'slide' => $slide
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ImageSlaid $imageSlaid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageSlaid $slide)
    {
        // dd( $request->all());
        $request->validate([
            'image' => ['required', 'mimes:jpg,jpeg,png']
        ]);
        //validashin
        //dd($category->id());
        $image = ImageUploadHelper::imageUpload($request->image);
        // dd( $image);
        //$category->title = $request->input('title');
        $slide->image = $image;
        // dd($slide);
        // $category->description = $request->input('description');
        /*$category = $category->fill(
            $request->only(['title','description'])
        )->save();*/
        // dd($imageSlaid);
        // $update = $imageSlaid->update(['images' => $image]);

        if( $slide->save() ) {
            return redirect()
            ->route('admin.slides.index')
            ->with('success', 'Категория успешно обновлена')
            /*->with('success', 'Категория успешно обновлена')*/;
        }

        return back()->wiht('error', 'Категория не обновилась');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( ImageSlaid $slide)
    {
        // dd(1);
        $slide::destroy($slide->id);

        return redirect()
            ->route('admin.slides.index')
            ->with('success', 'Картинка успешно удалена');
    }
}
