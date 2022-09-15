@extends('layosts.admin')
@section('title') Редактировать новость - @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать новость </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>

      <div class="table-responsive">
        @include('inc.message')
        <form  method="post" action="{{route('admin.news.update',['news' => $news])}}">
          @csrf
          @method('put')
          <div class="form-group">
            <label for="category_id">Категория</label>
            <select name="category_id" for="form-control" id="category_id">
              <option value="0">Нет категории</option>
              @foreach ($categories as $category)
               <option @if ($category->id === $news->category_id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
              @endforeach
            </select>
          </div> 
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $news->title}}">
            </div>
            <div class="form-group">
              <label for="autor">Автор</label>
              <input type="text" class="form-control" name="author" id="author" value="{{ $news->author}}">
            </div>
            <div class="form-group">
              <label for="status">Статус</label>
              <select name="status" for="form-control" id="status">
                <option @if ($news->status === 'DRAFT') selected @endif>DRAFT</option>
                <option @if ($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
                <option @if ($news->status === 'PUBLISHED') selected @endif>PUBLISHED</option>
              </select>
            </div>
            <div class="form-group">
              <label for="description">Описание</label>
              <textarea type="text" class="form-control" name="description" id="description" >{{ $news->description}}</textarea>
            </div>
            <div class="form-group">
              <label for="description">Категория</label>
              <textarea type="number" class="form-control" name="category_id" id="description" >{{$news->category_id}}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
      </div>
@endsection