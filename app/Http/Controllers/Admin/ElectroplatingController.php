<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageSlaid;
use App\Helpers\ImageUploadHelper;
use App\Models\Electroplating;
use App\Models\ProductImages;


class ElectroplatingController extends Controller
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


        $electroplatings =  Electroplating::with('productImage')->paginate(5);
        $page = $request->get('page', 1);
        if ($page > 0) {
            $page = ($page - 1) * 5;
        }
        //dd($electroplatings);
        //$catigories = Category::all();
        //dd($catigories);
        // dd(ImageSlaid::all());
        // dd($slideImages);
        // dd(1);
        return view('admin.electroplatings.index', [
            'electroplatings' => $electroplatings,
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
        return view('admin.electroplatings.create');
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
            'image' => ['required', 'mimes:jpg,jpeg,png'],
            'name' => ['required'],
            'type' => ['required']
        ]);


        // if (isset())
        // dd($request->file());
        $electroplating = Electroplating::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        //dd($electroplating ->id);
        
        $image = ImageUploadHelper::imageUpload($request->image, 'electroplating');

        $productImage = ProductImages::create([
            "image" => $image,
            'product_id' => $electroplating->id,
            'type' => $request->type,
        ]);
        if ($request->image2 != null) {
            $image2 = ImageUploadHelper::imageUpload($request->image2, 'electroplating');
            $productImage = ProductImages::create([
                "image" => $image2,
                'product_id' => $electroplating->id,
                'type' => $request->type,
            ]);
        }
        if ($request->image3 != null) {
            $image3 = ImageUploadHelper::imageUpload($request->image3, 'electroplating');
            $productImage = ProductImages::create([
                "image" => $image3,
                'product_id' => $electroplating->id,
                'type' => $request->type,
            ]);
        }
        if ($request->image4 != null) {
            $image4 = ImageUploadHelper::imageUpload($request->image4, 'electroplating');
            $productImage = ProductImages::create([
                "image" => $image4,
                'product_id' => $electroplating->id,
                'type' => $request->type,
            ]);
        }
        if ($request->image5 != null) {
            $image5 = ImageUploadHelper::imageUpload($request->image5, 'electroplating');
            $productImage5 = ProductImages::create([
                "image" => $image5,
                'product_id' => $electroplating->id,
                'type' => $request->type,
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

        

       

        if ($electroplating) {
            return redirect()
            ->route('admin.electroplatings.index')
            ->with('success', 'Товар успешно добавлен');
        }

        return back()->wiht('error', 'Товар не добавлен');
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
    public function edit(Electroplating $electroplating)
    {
       //$category = Category::findOrFail($id);
       return view('admin.electroplatings.edit', [
           'electroplating' => $electroplating
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ImageSlaid $imageSlaid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Electroplating $electroplating)
    {
        // dd( $request->all());
        $request->validate([
            'name' => ['required'],
            'type' => ['required']
        ]);

        $electroplatingResilt = $electroplating->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        //dd($electroplating ->id);
        $productImages = $electroplating->productImage->where('type', 'electroplating')->values();
        if ($request->image != null) {
            $image = ImageUploadHelper::imageUpload($request->image, 'electroplating');
            // $productImage = ProductImages::create([
            //     "image" => $image,
            //     'product_id' => $electroplating->id,
            //     'type' => $request->type,
            // ]);
            $productImage1 = $productImages[0];
            $productImage1->update([
                "image" => $image,
            ]);
        }
        
        if ($request->image2 != null) {
            $image2 = ImageUploadHelper::imageUpload($request->image2, 'electroplating');
            if( count($productImages) > 1 ) {
                $productImage2 = $productImages[1];
                $productImage2->update([
                "image" => $image2,
            ]);
            } else {
                $productImage = ProductImages::create([
                    "image" => $image2,
                    'product_id' => $electroplating->id,
                    'type' => $request->type,
                ]);
            }
        }
        if ($request->image3 != null) {
            $image3 = ImageUploadHelper::imageUpload($request->image3, 'electroplating');
            if( count($productImages) > 2 ) {
                $productImage3 = $productImages[2];
                $productImage3->update([
                "image" => $image3,
            ]);
            } else {
                $productImage = ProductImages::create([
                    "image" => $image3,
                    'product_id' => $electroplating->id,
                    'type' => $request->type,
                ]);
            }
        }
        if ($request->image4 != null) {
            $image4 = ImageUploadHelper::imageUpload($request->image4, 'electroplating');
            if( count($productImages) > 3 ) {
                $productImage4 = $productImages[3];
                $productImage4->update([
                "image" => $image4,
            ]);
            } else {
                $productImage = ProductImages::create([
                    "image" => $image4,
                    'product_id' => $electroplating->id,
                    'type' => $request->type,
                ]);
            }
        }
        if ($request->image5 != null) {
            $image5 = ImageUploadHelper::imageUpload($request->image5, 'electroplating');
            if( count($productImages) > 4 ) {
                $productImage5 = $productImages[4];
                $productImage5->update([
                "image" => $image5,
            ]);
            } else {
                $productImage = ProductImages::create([
                    "image" => $image5,
                    'product_id' => $electroplating->id,
                    'type' => $request->type,
                ]);
            }
        }
        // dd( $request->only(['image']));
        // $mageSlaid = ImageSlaid::insert(
        //     [
        //         1 => [
        //             "image" => $image,
        //         ],
        //     ]
        // );








        //$image = ImageUploadHelper::imageUpload($request->image, 'electroplating');

        //$slide->image = $image;
        // dd($slide);
        // $category->description = $request->input('description');
        /*$category = $category->fill(
            $request->only(['title','description'])
        )->save();*/
        // dd($imageSlaid);
        // $update = $imageSlaid->update(['images' => $image]);

        if( $electroplatingResilt ) {
            return redirect()
            ->route('admin.electroplatings.index')
            ->with('success', 'Товар успешно обновлен')
            /*->with('success', 'Категория успешно обновлена')*/;
        }

        return back()->wiht('error', 'Товар не обновилсяы');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Electroplating $electroplating)
    {
        // dd(1);
        $electroplating::destroy($electroplating->id);

        $productImages = $electroplating->productImage->where('type', 'electroplating')->values();
        for ($i = 0; $i<count($productImages);$i++) {
            ProductImages::destroy($productImages[$i]->id);
        }
        
        return redirect()
            ->route('admin.electroplatings.index')
            ->with('success', 'Товар успешно удален');
    }
}
