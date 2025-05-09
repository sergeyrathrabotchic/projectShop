@extends('layosts.admin')
@section('title') Редактировать резервуар - @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать резервуар </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  {{-- @php
    $slide = $category;
  @endphp --}}
  {{-- {{dd($slide)}} --}}
      <div class="table-responsive">
        @include('inc.message')
        <form  method="post" action="{{route('admin.waterWithdrawals.update', [
            'waterWithdrawal' => $reservoirs[0]->id,
            'reservoir' => $reservoir->id
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
            {{--  --}}
            <input type="hidden" class="form-control" name="type" id="type" value="cozyDecor">
            <div class="form-group">
              <label for="image">Максимальный объем резервуара</label>
              <input type="number" style="margin: 4px;width:98%;" class="form-control" name="max_volume" id="max_volume" @if ($reservoir->max_volume) value="{{$reservoir->max_volume}}" @endif required>
            </div>
            <div class="form-group">
              <label for="image">Текущий объем резервуара</label>
              <input type="number" style="margin: 4px;width:98%;" class="form-control" name="current_volume" id="current_volume" @if ($reservoir->current_volume) value="{{$reservoir->current_volume}}" @endif required>
            </div>
            {{-- <div class="form-group">
              <label for="image">Выбирете включен/выключен носос</label>
              <select  class="form-control" name="condition" id="city-select" required>
                <option  class="form-control" value="1" @if ($pump->condition == 1 ) selected{{"selected"}} @endif>Да</option>
                <option  class="form-control" value="0" @if ($pump->condition && ($pump->condition == 0)) selected{{"selected"}} @endif>Нет</option>
              </select>
            </div> --}}
            
           
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