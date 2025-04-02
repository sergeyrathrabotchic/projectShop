@extends('layosts.admin')
@section('title') Редактировать категорию - @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать категорию </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  {{-- @php
    $slide = $category;
  @endphp --}}
  {{-- {{dd($slide)}} --}}
      <div class="table-responsive">
        @include('inc.message')
        <form  method="post" action="{{route('admin.cozyDecors.update', [
            'cozyDecor' => $cozyDecor
        ])}}" enctype="multipart/form-data">
          @csrf 
          @method('put')
            {{-- <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}">
            </div>
            <div class="form-group">
              <label for="description">Описание</label>
              <textarea type="text" class="form-control" name="description" id="description" >{{ $category->description }}</textarea>
            </div> --}}

            <div class="form-group">
            <input type="hidden" class="form-control" name="type" id="type" value="cozyDecor">
            <input type="hidden" class="form-control" name="count" id="count" value="{{$cozyDecor->productImage->count()}}">
            <div class="form-group">
              <label for="image">Наименование товара</label>
              <input type="test" class="form-control" name="name" id="name" @if ($cozyDecor->name) value="{{$cozyDecor->name}}" @endif>
            </div>
            <div class="form-group">
              <label for="image">Цена товара</label>
              <input type="test" class="form-control" name="price" id="price" @if ($cozyDecor->price) value="{{$cozyDecor->price}}" @endif>
            </div>
            <div class="form-group">
              <label for="image">Описание товара</label>
              <textarea name="description" id="description" class="form-control" cols="30" rows="10">@if ($cozyDecor->description) {{$cozyDecor->description}} @endif</textarea>
            </div>
              <label for="image">Изображение</label>
              @if ($cozyDecor->productImage->where('type', 'cozyDecor')->count() > 0)
                {{-- <div style="display: flex;"> --}}
                  <div style="width:300px;height: 300px;    margin-bottom: 40px;">
                    <img id="image0" src="{{Storage::disk('image')->url($cozyDecor->productImage->where('type', 'cozyDecor')->values()[0]->image)}}" alt="" style="width:300px;height: 300px;margin-top: 10px;margin-bottom: 10px;">
                  </div>
                  {{-- <div>
                      <img src="" alt="" id="output0" style="width: 200px;height: 200px;margin-top: 10px;margin-bottom: 10px;">
                  </div> 
                </div>
                <button style="margin-top:40px" type="button" id="editImage0" class="btn btn-success">Изменить первую картинку</button> --}}
              @endif
              
              <input type="file" class="form-control" name="image" id="image">
            </div>
            <br>
            <div class="form-group">
              <label for="image2">Изображение 2</label>
              @if ($cozyDecor->productImage->where('type', 'cozyDecor')->count() > 1)
                <img src="{{Storage::disk('image')->url($cozyDecor->productImage->where('type', 'cozyDecor')->values()[1]->image)}}" alt="" style="width: 100px;height: 100px;margin-top: 10px;margin-bottom: 10px;">
              @endif
              <input type="file" class="form-control" name="image2" id="image2">
            </div>
            <br>
            <div class="form-group">
              <label for="image3">Изображение 3</label>
              @if ($cozyDecor->productImage->where('type', 'cozyDecor')->count() > 2)
                <img src="{{Storage::disk('image')->url($cozyDecor->productImage->where('type', 'cozyDecor')->values()[2]->image)}}" alt="" style="width: 100px;height: 100px;margin-top: 10px;margin-bottom: 10px;">
              @endif
              <input type="file" class="form-control" name="image3" id="image3">
            </div>
            <br>
            <div class="form-group">
              <label for="image4">Изображение 4</label>
              @if ($cozyDecor->productImage->where('type', 'cozyDecor')->count() > 3)
                <img src="{{Storage::disk('image')->url($cozyDecor->productImage->where('type', 'cozyDecor')->values()[3]->image)}}" alt="" style="width: 100px;height: 100px;margin-top: 10px;margin-bottom: 10px;">
              @endif
              <input type="file" class="form-control" name="image4" id="image4">
            </div>
            <br>
            <div class="form-group">
              <label for="image5">Изображение 5</label>
              @if ($cozyDecor->productImage->where('type', 'cozyDecor')->count() > 4)
                <img src="{{Storage::disk('image')->url($cozyDecor->productImage->where('type', 'cozyDecor')->values()[4]->image)}}" alt="" style="width: 100px;height: 100px;margin-top: 10px;margin-bottom: 10px;">
              @endif
              <input type="file" class="form-control" name="image5" id="image5">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
      </div>
      {{-- <script src="{{ asset('js/croppie/croppie.min.js') }}"></script> --}}
      <script type="text/javascript">

      // const image0 = document.getElementById('image0');
      // const сroppie = new Croppie(image0, {
      //   viewport: {
      //         width: 150,
      //         height: 200
      //     }
      // });


      //if(image0) {
        // let basic = new Croppie(document.getElementById('image0'), {
        //   viewport: {
        //       width: 150,
        //       height: 200
        //   }
        // });
      //}
      
    </script>
@endsection