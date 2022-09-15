@extends('layosts.admin')
@section('title') Добавить новую новость - @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить новость </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>

      <div class="table-responsive">
        @include('inc.message')
        <form  method="post" action="{{route('admin.news.store'/*,['status' => 'new']*/)}}">
          @csrf
            <div class="form-group">
              <label for="category_id">Категория</label>
              <select name="category_id" for="form-control" id="category_id">
                <option value="0">Нет категории</option>
                @foreach ($categories as $category)
                <option @if (old('category_id') === $category->id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
              </select>
            </div>  
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
              <label for="autor">Автор</label>
              <input type="text" class="form-control" name="autor" id="autor" value="{{old('autor')}}">
            </div>
            <div class="form-group">
              <label for="status">Статус</label>
              <select name="status" for="form-control" id="status">
                <option @if (old('status') === 'DRAFT') selected @endif>DRAFT</option>
                <option @if (old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
                <option @if (old('status') === 'PUBLISHED') selected @endif>PUBLISHED</option>
              </select>
            </div>
            <div class="form-group">
              <label for="description">Описание</label>
              <textarea type="text" class="form-control" name="description" id="description" >{{old('description')}}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
      </div>
@endsection