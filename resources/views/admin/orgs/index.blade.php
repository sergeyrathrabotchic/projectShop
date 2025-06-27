@extends('layosts.admin')
@section('title') Список юридических лиц - @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Юридические лица</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{route('admin.orgs.create')}}" class="btn btn-sm btn-outline-secondary">Добавить новое юридичесое лицо</a>
      </div>
      {{-- <div class="btn-group me-2">
        <a href="{{route('admin.news.create')}}" class="btn btn-sm btn-outline-secondary">Добавить новую</a>
      </div>
      <div class="btn-group me-2">
        <a href="{{route('news444444.create')}}" class="btn btn-sm btn-outline-secondary">Проверка</a>
      </div> --}}
    </div>
  </div>

      <h2>Список юридических лиц</h2>
      <div class="table-responsive">
                <form  method="get" action="{{route('admin.orgs.index')}}" enctype="multipart/form-data">
          <div style="display: flex;gap: 10px;margin-top: 3px;">
            <label style="min-width: 166px;display: flex;align-items: center;" for="office">Поиск по названию</label>
            <div class="form-group">  
                <input style="min-width: 100px;" type="text" class="form-control" name="office" id="office">
            </div>
            <button type="submit" class="btn btn-primary">Найти</button>
          </div>
        </form>
        <form  method="get" action="{{route('admin.orgs.index')}}" enctype="multipart/form-data">
          <div style="display: flex;gap: 10px;margin-top: 3px;">
            <label style="min-width: 166px;display: flex;align-items: center;" for="title">Поиск по лицевому счету</label>
            <div class="form-group">  
                <input style="min-width: 100px;" type="text" class="form-control" name="title" id="title">
            </div>
            <button type="submit" class="btn btn-primary">Найти</button>
          </div>
        </form>
        <form  method="get" action="{{route('admin.orgs.index')}}" enctype="multipart/form-data">
          <div style="display: flex;gap: 10px;margin-top: 3px;">
            <label style="min-width: 166px;display: flex;align-items: center;" for="street">Поиск по улице</label>
            <div class="form-group">  
                <input style="min-width: 100px;" type="text" class="form-control" name="street" id="street">
            </div>
            <button type="submit" class="btn btn-primary">Найти</button>
          </div>
        </form>
        @include('inc.message')
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Лицевой счет</th>
              <th scope="col">Адрес</th>
              <th scope="col">Название</th>
              <th scope="col">М<span style="text-transform: uppercase">2</span></th>
              {{-- <th scope="col">кв метров</th> --}}
              <!--<th scope="col">Автор</th>-->
              <th scope="col">Дата последнего обновления</th>
              <th scope="col">Действие</th>
            </tr>
          </thead>
          <tbody>
             {{-- @forelse ($categories as $category)
                 <tr>
                   <td>{{$category->id}}</td>
                   <td>{{$category->title}} ({{$category->news()->get()->first()->title ?? null}})</td>
                   <td>
                     @if ($category->updated_at)
                      {{$category->updated_at->format('d-m-Y H:i')}}
                     @else - @endif
                    </td>
                    <td>
                      <a href="{{route('admin.slide.edit', ['slide' => $category->id ])}}">Ред.</a>&nbsp;|&nbsp;<a href="javascript:;" style="color: red">Уд.</a>
                    </td>
                 </tr>
             @empty
                 <tr>
                    <td colspan="4">Таких записей нет</td>
                 </tr>
             @endforelse --}}
             {{-- @for ($i = 0; $i < count($slideImages); $i++)
              <td>1</td>
              <td>
                @if ($slideImages[$i]->updated_at)
                 {{$slideImages[$i]->updated_at->format('d-m-Y H:i')}}
                @else - @endif
              </td>
             @endfor --}}
             @php
                 $i = $page;
             @endphp
            @forelse ($orgs as $org)
                  @php
                      $i = $i +1;
                  @endphp
                 <tr>
                  <td>{{$i}}</td>
                  <td>
                    <h6>{{$org->title}}</h6>
                  </td>
                  {{-- {{dd($ceramic)}} --}}
                  <td>
                    {{-- <img src="{{Storage::disk('image')->url($ceramic->productImage->where('type', 'cozyDecor')->values()->reverse()[0]->image)}}" alt="" style="width: 80%;padding: 10px;"></td> --}}
                    <h6>{{$org->account->address->street}}, {{$org->account->address->house}}</h6>
                  </td>
                  <td>
                      {{-- @if ($pump->condition == 1)
                        Да
                      @else
                        Нет
                      @endif --}}
                      <h6>{{$org->office}}</h6>
                  </td>
                  <td>
                    <h6>{{$org->account->address->meterGroup->meter[0]->amount}}</h6>
                  </td>
                  {{-- <td>
                    <h6>{{$address->meterGroup->meter[0]->amount}}</h6>
                  </td> --}}
                  <td>
                    @if ($org->updated_at)
                     {{$org->updated_at->format('d-m-Y H:i')}}
                    @else - @endif
                   </td> 
                   {{-- <td>{{$category->id}}</td>
                   <td>{{$category->title}} ({{$category->news()->get()->first()->title ?? null}})</td>
                   <td>
                     @if ($category->updated_at)
                      {{$category->updated_at->format('d-m-Y H:i')}}
                     @else - @endif
                    </td> --}}
                    <td>
                      @php
                          // $amulet = $ceramic;
                      @endphp
                      <a href="{{route('admin.orgs.edit', ['org' => $org->id ])}}" class="btn btn-primary">Ред.</a>
                      <a href="{{route('admin.orgs.show', ['org' => $org->id ])}}" class="btn btn-primary">Показ.</a>
                      {{-- &nbsp;|&nbsp; --}}
                      {{-- <a href="{{route('admin.slides.destroy', ['slide' => $slide->id ])}}" style="color: red">Уд.</a> --}}
          {{-- {{dd($slide->id)}} --}}
                      {{-- <form  action="{{ route('admin.slides.destroy', ['slide' => $slide->id ])}}"  method="post">
                        
                        @csrf  
                        @method('put')
                        <button  type="submit" style="color: red">Уд.</button>
                      </form> --}}
                      
                      <form  action="{{ route('admin.orgs.destroy' , ['org' => $org->id ])}}" method="POST">
                        {{ csrf_field() }}           
                        <button name="_method" type="hidden" value="DELETE" class="btn btn-danger" style="margin-top: 5px;">Удалить</button>
                    </form>
                    </td>
                 </tr>
             @empty
                 <tr>
                    <td colspan="4">Таких записей нет</td>
                 </tr>
             @endforelse
            
          </tbody>
        </table>
      </div>
      <div>
        {{ $orgs->links()}}
      </div>
@endsection