@extends('layosts.main')
@section('title') Список новостей - @parent @stop
@section('content')
      <!--<div class="col">
        <div class="card shadow-sm">
          <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

          <div class="card-body">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
              </div>
              <small class="text-muted">9 mins</small>
            </div>
          </div>
        </div>
      </div>-->
@if(!empty($newsList))
@php
//$a = [1,2,3];
    //dd($a);
    //dd($newsList);
    //print_r($newsList[0])
@endphp
@foreach($newsList as $news)
    <?php if($_GET['categoryId'] == $news->category_id): ?>

        <div class="col">
            <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
                <p class="card-text"><strong>{{$news->title}}</strong> <br> {!!$news->description!!}.</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                2
                <a href="{{route('news.show',['id' => $news->id,'categoryId' => $news->category_id])}}" class="btn btn-sm btn-outline-secondary">Смотреть подробние</a>
              </div>
                <small class="text-muted">Автор: {{$news->author}} <br>
                {{ now()->format('d-m-Y H:i')}}</small>
            </div>
            </div>
            </div>
        </div>


    <?php endif?>
    
@endforeach
@else 
    <p>Новостей нет</p>
@endif
@endsection 