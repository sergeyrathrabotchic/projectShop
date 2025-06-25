@extends('layosts.admin')
@section('title') Редактировать скважину с насосом - @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать скважину с насосом </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  {{-- @php
    $slide = $category;
  @endphp --}}
  {{-- {{dd($slide)}} --}}
      <div class="table-responsive">
        @include('inc.message')
        <form  method="post" action="{{route('admin.personals.update', [
            'personal' => $personal
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

            <input type="hidden" class="form-control" name="type" id="type" value="cozyDecor">
            <div class="form-group">
              <label for="image">Фамилия имя отчество</label>
              <input type="text" style="margin: 4px;width:98%;" class="form-control" name="FIO" id="FIO" @if ($personal->FIO) value="{{$personal->FIO}}" @endif required>
            </div>
            <div class="form-group">
              <label for="image">Личевой счет</label>
              <input type="number" style="margin: 4px;width:98%;" class="form-control" name="sub_addr" id="sub_addr" @if ($personal->sub_addr) value="{{$personal->sub_addr}}" @endif required>
            </div>
            <div class="form-group">
              <label for="image">Выбирете адрес</label>
              <select  class="form-control" name="address_id" id="addres_id" required>
                @php
                  $i = 0;
                @endphp
                @forelse ($addresses as $address)
                  @php
                    $i = $i+1;
                  @endphp
                  @if ($address->id == $addresId[0]->id)
                    <option  class="form-control" value="{{$address->id}}" selected>{{$address->street}}, {{$address->house}}</option>
                  @else
                    <option  class="form-control" value="{{$address->id}}">{{$address->street}}, {{$address->house}}</option>
                  @endif
                @empty
                  <option  class="form-control" value="" selected>Добавти хотя бы один Адрес</option>
                @endforelse
              </select>
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