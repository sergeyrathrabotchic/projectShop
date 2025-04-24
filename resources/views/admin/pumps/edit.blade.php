@extends('layosts.admin')
@section('title') Редактировать скважену с насосом - @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать скважену с насосом </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  {{-- @php
    $slide = $category;
  @endphp --}}
  {{-- {{dd($slide)}} --}}
      <div class="table-responsive">
        @include('inc.message')
        <form  method="post" action="{{route('admin.pumps.update', [
            'pump' => $pump
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
              <label for="image">Выбирете номер емкости</label>
              <select  class="form-control" name="id_reservoir" id="city-select" condition>
                <option  class="form-control" value="1"  @if ($pump->id_reservoir && $pump->id_reservoir == 1) selected{{"selected"}} @endif>Емкость №1</option>
                <option  class="form-control" value="2" @if ($pump->id_reservoir && $pump->id_reservoir == 2) selected{{"selected"}} @endif>Емкость №2</option>
              </select>
            </div>
            <div class="form-group">
              <label for="image">Обьем закачки в секунду</label>
              <input type="number" style="margin: 4px;width:98%;" class="form-control" name="pumping_volume" id="pumping_volume" @if ($pump->pumping_volume) value="{{$pump->pumping_volume}}" @endif frequired>
            </div>
            <div class="form-group">
              <label for="image">Выбирете включен/выключен носос</label>
              <select  class="form-control" name="condition" id="city-select" required>
                <option  class="form-control" value="1" @if ($pump->condition == 1 ) selected{{"selected"}} @endif>Да</option>
                <option  class="form-control" value="0" @if ($pump->condition && ($pump->condition == 0)) selected{{"selected"}} @endif>Нет</option>
              </select>
              {{-- <label for="image">Площадь</label>
              <input type="number" step="0.01" style="margin: 4px;width:98%;" class="form-control" name="amount" id="amount" required> --}}
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