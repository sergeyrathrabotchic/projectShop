@extends('layosts.admin')
@section('title') Добавить новый товар - @parent @stop
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить товар </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>

  <input type=file name=filename id=file>
  <button type=button onclick='myFunction()'>загрузка картинки</button>
  <div style="width: 100%;height: 400px" id="boxImage1">
    <img id="image1" style="width: 100%" src="/storage/image/electroplating/_n64062f589e54f.jpeg" alt="">
  </div>
  <a href="/storage/image/electroplating/_n64062f589e54f.jpeg" download="FileName.png">тест</a>
      <div class="table-responsive">
        @include('inc.message')
        <form  method="post" action="{{route('admin.ceramics.store')}}" enctype="multipart/form-data">
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
            
            <input type="hidden" class="form-control" name="type" id="type" value="ceramic">
            <div class="form-group">
              <label for="image">Наименование товара</label>
              <input  type="test" class="form-control"  name="name" id="name">
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
              <input id="test" type="file" onchange="showFile(this)" class="form-control" name="image" id="image">
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
      <button type="button" id="bottintest" class="btn btn-success">тест</button>

      <script src="{{ asset('js/croppie/croppie.min.js') }}"></script>
      <script type="text/javascript">
      //let new = new test;
      //var croppie = new Croppie(document.getElementById('image1'), {
      //   aspectRatio: 1,
      //   viewMode: 0,
      // });
      // var basic = new Croppie(document.getElementById('image1'),{
      //   viewport: {
      //       width: 150,
      //       height: 200
      //   }
      // });
      // basic.croppie('bind', {
      //     url: '/storage/image/electroplating/_n64062f589e54f.jpeg',
      //     points: [77,469,280,739]
      // });
      // //on button click
      // var bottintest = document.getElementById('bottintest');

      // bottintest.addEventListener('click', function(){
      //   basic.croppie('result', 'html').then(function(html) {
      //     // html is div (overflow hidden)
      //     // with img positioned inside.
      //   });
      // });


      // function showFile(input) {
      //   let file = input.files[0];

      //   alert(`File name: ${file.name}`); // например, my.png
      //   alert(`Last modified: ${file.lastModified}`); // например, 1552830408824
      // }
      






















      



// var c = new Croppie(document.getElementById('item'), opts);
// // call a method
// c.method(args);
// $('.my-croppie').on('update.croppie', function(ev, cropData) {});
// // or
// document.getElementById('another-croppie').addEventListener('update', function(ev) { var cropData = ev.detail; });
      


// var el = document.getElementById('vanilla-demo');
//       var vanilla = new Croppie(el, {
//           viewport: { width: 100, height: 100 },
//           boundary: { width: 300, height: 300 },
//           showZoomer: false,
//           enableOrientation: true
//       });
//       vanilla.bind({
//           url: '/storage/image/ceramic/_n641ee6b5e7073.jpg',
//           orientation: 4
//       });
//       //on button click
//       vanilla.result('blob').then(function(blob) {
//           // do something with cropped blob
//       });     
      
      
//       c.method(args);

      // $uploadCrop = document.getElementById('test').croppie({
      //     enableExif: true,
      //     viewport: {
      //         width: 200,
      //         height: 200,
      //         type: 'circle'
      //     },
      //     boundary: {
      //         width: 300,
      //         height: 300
      //     }
      // });


      var croppie; 
      var croppie2;
      var image;

      function test2() {
        croppie = new Croppie(document.querySelector('#image1'), {
          // aspectRatio: 1,
          // viewMode: 0,
          viewport: {
                width: 150,
                height: 200
            }
        });
      }
      function test() {
        // let boxImage1 = document.querySelector('#boxImage1');
        // boxImage1.childNodes[1].remove()
        
        setTimeout(test2, 2000);
        
      }
      function myFunction() {

        croppie.destroy();
        croppie = 0;

      var file = document.getElementById('file').files[0];
      var reader  = new FileReader();
      // it's onload event and you forgot (parameters)
      reader.onload = function(e)  {
          //var image = document.createElement("img");
          image = document.querySelector('#image1');
          // the result image data
          image.src = e.target.result;
          //document.body.appendChild(image);
      }
      // you have to declare the file loading
      reader.readAsDataURL(file);
      setTimeout(test, 2000);
      
      }
      
      
      image = document.querySelector('#image1');
      croppie = new Croppie(image, {
        // aspectRatio: 1,
        // viewMode: 0,
        viewport: {
              width: 150,
              height: 200
          }
      });

      
    
      // var basic = document.getElementById('image1').croppie({
      //     viewport: {
      //         width: 150,
      //         height: 200
      //     }
      // });
      
      </script>
@endsection