@extends('layosts.admin')
@section('title') Редактировать начисление - @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать начисление </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  {{-- @php
    $slide = $category;
  @endphp --}}
  {{-- {{dd($slide)}} --}}
      <div class="table-responsive">
        @include('inc.message')
        <form  method="post" action="{{route('admin.charges.update', [
            'charge' => $charge->id
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
            <input type="hidden" class="form-control" name="accountId" id="accountId" value="{{$account[0]->id}}">
            <div class="form-group">
              <label for="image">Дата</label>
              <input type="text" style="margin: 4px;width:98%;" class="form-control" name="c_date" id="c_date" @if ($charge->c_date) value="{{$charge->c_date}}" @endif required>
            </div>
            <div class="form-group">
              <label for="image">Показания</label>
              <input type="number" style="margin: 4px;width:98%;" class="form-control" name="meter" id="meter" @if ($charge->meter) value="{{$charge->meter}}" @endif required>
            </div>
            <div class="form-group">
              <label for="image">Выбирете тариф</label>
              <select  class="form-control" name="id_tarif" id="id_tarif" required>
                @php
                  $i = 0;
                @endphp
                @forelse ($tarifs as $tarif)
                  @if ($tarifId == $tarif->id)
                    <option  class="form-control" value="{{$tarif->id}}" selected>{{$tarif->in_date}}, {{$tarif->title}}, {{$tarif->price}}</option>
                  @else
                    <option  class="form-control" value="{{$tarif->id}}">{{$tarif->in_date}}, {{$tarif->title}}, {{$tarif->price}}</option>
                  @endif
                @empty
                  <option  class="form-control" value="" selected>Добавти хотя бы один тариф</option>
                @endforelse
              </select>
            </div>
            <div class="form-group">
              <label for="image">Сумма внесенная клиентом</label>
              <input type="number" style="margin: 4px;width:98%;" class="form-control" name="amount" id="amount" @if ($payment[0]->amount) value="{{$payment[0]->amount}}" @endif required>
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