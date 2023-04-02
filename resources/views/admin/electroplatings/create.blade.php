@extends('layosts.admin')
@section('title') Добавить новый товар - @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить товар </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>

  <input type=file name=filename id=file  class="form-control" style="margin-bottom: 20px;">
  <div style="display: flex;margin-bottom: 20px;">
     <button style="margin-right: 10px" class="btn btn-success" type=button onclick='myFunction()'>Запуск редактирования</button>
     <button style="margin-right: 10px" id="fixImage" class="btn btn-success" type=button >Фиксация элемента</button>
     <a id="uplodeImage" href="/storage/image/electroplating/_n64062f589e54f.jpeg" class="btn btn-success" download="image.png">Загрузка изображения</a>
  </div>

  <div style="display: none" id="boxImage1">
    {{-- <img id="image1" style="width: 100%" src="/storage/image/electroplating/_n64062f589e54f.jpeg" alt=""> --}}
  <div style="width: 45%;margin-right: 10px;margein-\r:10px;height: 400px;min-width: 200px;"> 
    <img id="image1" style="width: 100%" src="" alt="">
  </div>
  <div style="width: 45%;height: 400px;">
    <img id="upload1" style="width: 100%" src="" alt="">
  </div>
  </div>

      <div class="table-responsive">
        @include('inc.message')
        <form  method="post" action="{{route('admin.electroplatings.store')}}" enctype="multipart/form-data">
          @csrf 
            {{-- <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
              <label for="description">Описание</label>
              <textarea type="text" class="form-control" name="description" id="description" >{{old('description')}}</textarea>
            </div>
            <br> --}}
            <input type="hidden" class="form-control" name="type" id="type" value="electroplating">
            <div class="form-group">
              <label for="image">Наименование товара</label>
              <input type="test" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
              <label for="image">Цена товара</label>
              <input type="test" class="form-control" name="price" id="price">
            </div>
            <div class="form-group">
              <label for="image">Описание товара</label>
              <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label for="image">Изображение</label>
              <input type="file" class="form-control" name="image" id="image">
            </div>
            <br>
            <div class="form-group">
              <label for="image2">Изображение 2</label>
              <input type="file" class="form-control" name="image2" id="image2">
            </div>
            <br>
            <div class="form-group">
              <label for="image3">Изображение 3</label>
              <input type="file" class="form-control" name="image3" id="image3">
            </div>
            <br>
            <div class="form-group">
              <label for="image4">Изображение 4</label>
              <input type="file" class="form-control" name="image4" id="image4">
            </div>
            <br>
            <div class="form-group">
              <label for="image5">Изображение 5</label>
              <input type="file" class="form-control" name="image5" id="image5">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
      </div>
      <script src="{{ asset('js/cropperjs/dist/cropper.min.js') }}"></script>
      <script type="text/javascript">
      var croppie2;
      var image;

      function test() {
        const croppie = new Cropper(document.querySelector('#image1'), {
          aspectRatio: 0,
          viewMode: 0
        });


      let fixImage = document.querySelector('#fixImage');

      
      fixImage.addEventListener('click', function(){
        var croppieImage = croppie.getCroppedCanvas().toDataURL("image/png");
        let upload1 = document.querySelector('#upload1');

        upload1.src = croppieImage;

        let uplodeImage = document.querySelector('#uplodeImage');

        uplodeImage.href = croppieImage;

      });
        
      }
      function myFunction() {     
      let boxImage1 = document.querySelector('#boxImage1');
      boxImage1.style = "width: 100%;height: 400px;margin-bottom: 50px;display: flex;";
      var file = document.getElementById('file').files[0];
      var reader  = new FileReader();

      reader.onload = function(e)  {
          image = document.querySelector('#image1');
          image.src = e.target.result;
      }

      reader.readAsDataURL(file);
      setTimeout(test, 2000);
      
      }
      </script>
@endsection