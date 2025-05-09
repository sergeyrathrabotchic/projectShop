@extends('layosts.admin')
@section('title') Редактировать адрес - @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать адрес </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  {{-- @php
    $slide = $category;
  @endphp --}}
  {{-- {{dd($slide)}} --}}
      <div class="table-responsive">
        @include('inc.message')
        <form  method="post" action="{{route('admin.addresses.update', [
            'address' => $address
        ])}}" >
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
            {{-- <input type="hidden" class="form-control" name="type" id="type" value="cozyDecor"> --}}
            {{-- <input type="hidden" class="form-control" name="count" id="count" value="{{$cozyDecor->productImage->count()}}"> --}}
            <div class="form-group">
              <label for="image">Наименование улицы</label>
              <input type="test" style="margin: 4px;width:98%;" class="form-control" name="street" id="street" @if ($address->street) value="{{$address->street}}" @endif>
            </div>
            <div class="form-group">
              <label for="image">Дом</label>
              <input type="test" style="margin: 4px;width:98%;" class="form-control" name="house" id="house" @if ($address->house) value="{{$address->house}}" @endif>
            </div>
            <div class="form-group">
              <label for="image">Описание группы Адресов по площади</label>
              <input type="test" style="margin: 4px;width:98%;" class="form-control" name="title" id="title" @if ($meterGroup[0]->title) value="{{$meterGroup[0]->title}}" @endif>
            </div>
            <div class="form-group">
              <label for="image">Площадь</label>
              <input type="number" step="0.01" style="margin: 4px;width:98%;"  class="form-control" name="amount" id="amount" @if ($meterGroup[0]->meter[0]->amount) value="{{$meterGroup[0]->meter[0]->amount}}" @endif>
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