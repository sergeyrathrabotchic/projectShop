@extends('layosts.admin')
@section('title') Список категорий - @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Категории </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{route('admin.ceramics.create')}}" class="btn btn-sm btn-outline-secondary">Добавить новый товар</a>
      </div>
      {{-- <div class="btn-group me-2">
        <a href="{{route('admin.news.create')}}" class="btn btn-sm btn-outline-secondary">Добавить новую</a>
      </div>
      <div class="btn-group me-2">
        <a href="{{route('news444444.create')}}" class="btn btn-sm btn-outline-secondary">Проверка</a>
      </div> --}}
    </div>
  </div>

      <h2>Список товаров в категории гальваника</h2>
      <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Название</th>
              <th scope="col">Первая картинка</th>
              <!--<th scope="col">Автор</th>-->
              <th scope="col">Дота последнего обновления</th>
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
            @forelse ($ceramics as $ceramic)
                  @php
                      $i = $i +1;
                  @endphp
                 <tr>
                  <td>{{$i}}</td>
                  <td>
                    <h6>{{$ceramic->name}}</h6>
                  </td>
                  <td>
                    <img src="{{Storage::disk('image')->url($ceramic->productImage->where('type', 'ceramic')->values()->reverse()[0]->image)}}" alt="" style="width: 80%;padding: 10px;"></td>
                  <td>
                    @if ($ceramic->updated_at)
                     {{$ceramic->updated_at->format('d-m-Y H:i')}}
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
                      <a href="{{route('admin.ceramics.edit', ['ceramic' => $ceramic->id ])}}" class="btn btn-primary">Ред.</a>
                      {{-- &nbsp;|&nbsp; --}}
                      {{-- <a href="{{route('admin.slides.destroy', ['slide' => $slide->id ])}}" style="color: red">Уд.</a> --}}
          {{-- {{dd($slide->id)}} --}}
                      {{-- <form  action="{{ route('admin.slides.destroy', ['slide' => $slide->id ])}}"  method="post">
                        
                        @csrf  
                        @method('put')
                        <button  type="submit" style="color: red">Уд.</button>
                      </form> --}}
                      <form  action="{{ route('admin.ceramics.destroy' , ['ceramic' => $ceramic->id ])}}" method="POST">
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
        {{ $ceramics->links()}}
      </div>
@endsection