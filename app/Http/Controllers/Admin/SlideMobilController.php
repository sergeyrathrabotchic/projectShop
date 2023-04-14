<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageMobilSlaid;
use App\Helpers\ImageUploadHelper;

class SlideMobilController extends Controller
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


        $slides =  ImageMobilSlaid::paginate(5);
        $page = $request->get('page', 1);
        if ($page > 0) {
            $page = ($page - 1) * 5;
        }
        //$catigories = Category::all();
        //dd($catigories);
        // dd(ImageSlaid::all());
        // dd($slideImages);
        // dd(1);
        return view('admin.slideMobils.index', [
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
        return view('admin.slideMobils.create');
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
        
        
        $image = ImageUploadHelper::imageUpload($request->image, 'slaid');
        $mageSlaid = ImageMobilSlaid::create([
            "image" => $image,
        ]);
        if ($request->image2 != null) {
            $image2 = ImageUploadHelper::imageUpload($request->image2, 'slaid');
            $mageSlaid2 = ImageMobilSlaid::create([
                "image" => $image2,
            ]);
        }
        if ($request->image3 != null) {
            $image3 = ImageUploadHelper::imageUpload($request->image3, 'slaid');
            $mageSlaid3 = ImageMobilSlaid::create([
                "image" => $image3,
            ]);
        }
        if ($request->image4 != null) {
            $image4 = ImageUploadHelper::imageUpload($request->image4, 'slaid');
            $mageSlaid4 = ImageMobilSlaid::create([
                "image" => $image4,
            ]);
        }
        if ($request->image5 != null) {
            $image5 = ImageUploadHelper::imageUpload($request->image5, 'slaid');
            $mageSlaid5 = ImageMobilSlaid::create([
                "image" => $image5,
            ]);
        }
        // dd( $request->only(['image']));
        // $mageSlaid = ImageSlaid::insert(
        //     [
        //         1 => [
        //             "image" => $image,
        //         ],
        //     ]
        // );

        

       

        if ($mageSlaid) {
            return redirect()
            ->route('admin.slideMobils.index')
            ->with('success', 'Картинка успешно добавлена');
        }

        return back()->wiht('error', 'Картинка не добавилась');
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
    public function edit(ImageMobilSlaid $slideMobil)
    {
       //$category = Category::findOrFail($id);
       return view('admin.slideMobils.edit', [
           'slideMobil' => $slideMobil
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ImageSlaid $imageSlaid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageMobilSlaid $ImageMobilSlaid)
    {
        // dd( $request->all());
        $request->validate([
            'image' => ['required', 'mimes:jpg,jpeg,png']
        ]);
        //validashin
        //dd($category->id());
        $image = ImageUploadHelper::imageUpload($request->image, 'slaid');
        // dd( $image);
        //$category->title = $request->input('title');
        $ImageMobilSlaid->image = $image;
        // dd($slide);
        // $category->description = $request->input('description');
        /*$category = $category->fill(
            $request->only(['title','description'])
        )->save();*/
        // dd($imageSlaid);
        // $update = $imageSlaid->update(['images' => $image]);

        if( $ImageMobilSlaid->save() ) {
            return redirect()
            ->route('admin.slideMobils.index')
            ->with('success', 'Картинка успешно обновлена')
            /*->with('success', 'Категория успешно обновлена')*/;
        }

        return back()->wiht('error', 'Картинка не обновилась');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( ImageMobilSlaid $slideMobil)
    {
        // dd(1);
        $slideMobil::destroy($slideMobil->id);

        return redirect()
            ->route('admin.slideMobils.index')
            ->with('success', 'Картинка успешно удалена');
    }
}
