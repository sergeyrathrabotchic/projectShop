<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageSlaid;
use App\Helpers\ImageUploadHelper;
use App\Models\CozyDecor;
use App\Models\ProductImages;


class CozyDecorController extends Controller
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


        $сeramics =  CozyDecor::with('meterGroup.meter')->paginate(5);
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
        return view('admin.cozyDecors.index', [
            'ceramics' => $сeramics ,
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
        return view('admin.cozyDecors.create');
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
        $ceramic = CozyDecor::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        //dd($electroplating ->id);
        
        $image = ImageUploadHelper::imageUpload($request->image, 'ceramic');

        $productImage = ProductImages::create([
            "image" => $image,
            'product_id' => $ceramic->id,
            'type' => $request->type,
        ]);
        if ($request->image2 != null) {
            $image2 = ImageUploadHelper::imageUpload($request->image2, 'ceramic');
            $productImage = ProductImages::create([
                "image" => $image2,
                'product_id' => $ceramic->id,
                'type' => $request->type,
            ]);
        }
        if ($request->image3 != null) {
            $image3 = ImageUploadHelper::imageUpload($request->image3, 'ceramic');
            $productImage = ProductImages::create([
                "image" => $image3,
                'product_id' => $ceramic->id,
                'type' => $request->type,
            ]);
        }
        if ($request->image4 != null) {
            $image4 = ImageUploadHelper::imageUpload($request->image4, 'ceramic');
            $productImage = ProductImages::create([
                "image" => $image4,
                'product_id' => $ceramic->id,
                'type' => $request->type,
            ]);
        }
        if ($request->image5 != null) {
            $image5 = ImageUploadHelper::imageUpload($request->image5, 'ceramic');
            $productImage5 = ProductImages::create([
                "image" => $image5,
                'product_id' => $ceramic->id,
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

        

       

        if ($ceramic) {
            return redirect()
            ->route('admin.cozyDecors.index')
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
    public function edit(CozyDecor $cozyDecor)
    {
       //$category = Category::findOrFail($id);
       return view('admin.cozyDecors.edit', [
           'cozyDecor' => $cozyDecor
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ImageSlaid $imageSlaid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CozyDecor $cozyDecor)
    {
        // dd( $request->all());
        $request->validate([
            'name' => ['required'],
            'type' => ['required']
        ]);

        $ceramicResilt = $cozyDecor->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        //dd($electroplating ->id);
        $productImages = $cozyDecor->productImage->where('type', 'cozyDecor')->values();
        //dd($productImages);
        if ($request->image != null) {
            $image = ImageUploadHelper::imageUpload($request->image, 'cozyDecor');
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
            $image2 = ImageUploadHelper::imageUpload($request->image2, 'cozyDecor');
            if( count($productImages) > 1 ) {
                $productImage2 = $productImages[1];
                $productImage2->update([
                "image" => $image2,
            ]);
            } else {
                $productImage = ProductImages::create([
                    "image" => $image2,
                    'product_id' => $cozyDecor->id,
                    'type' => $request->type,
                ]);
            }
        }
        if ($request->image3 != null) {
            $image3 = ImageUploadHelper::imageUpload($request->image3, 'cozyDecor');
            if( count($productImages) > 2 ) {
                $productImage3 = $productImages[2];
                $productImage3->update([
                "image" => $image3,
            ]);
            } else {
                $productImage = ProductImages::create([
                    "image" => $image3,
                    'product_id' => $cozyDecor->id,
                    'type' => $request->type,
                ]);
            }
        }
        if ($request->image4 != null) {
            $image4 = ImageUploadHelper::imageUpload($request->image4, 'cozyDecor');
            if( count($productImages) > 3 ) {
                $productImage4 = $productImages[3];
                $productImage4->update([
                "image" => $image4,
            ]);
            } else {
                $productImage = ProductImages::create([
                    "image" => $image4,
                    'product_id' => $cozyDecor->id,
                    'type' => $request->type,
                ]);
            }
        }
        if ($request->image5 != null) {
            $image5 = ImageUploadHelper::imageUpload($request->image5, 'cozyDecor');
            if( count($productImages) > 4 ) {
                $productImage5 = $productImages[4];
                $productImage5->update([
                "image" => $image5,
            ]);
            } else {
                $productImage = ProductImages::create([
                    "image" => $image5,
                    'product_id' => $cozyDecor->id,
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

        if( $ceramicResilt ) {
            return redirect()
            ->route('admin.cozyDecors.index')
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
    public function destroy( CozyDecor $cozyDecor)
    {
        // dd(1);
        $cozyDecor::destroy($cozyDecor->id);

        $productImages = $cozyDecor->productImage->where('type', 'cozyDecor')->values();
        for ($i = 0; $i<count($productImages);$i++) {
            ProductImages::destroy($productImages[$i]->id);
        }
        
        return redirect()
            ->route('admin.cozyDecors.index')
            ->with('success', 'Товар успешно удален');
    }
}
