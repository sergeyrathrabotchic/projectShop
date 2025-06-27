@extends('layosts.admin')
@section('title') Добавить новое физическое лицо - @parent @stop
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить новое физическое лицо </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>

  {{-- <input type=file name=filename id=file  class="form-control" style="margin-bottom: 20px;">
  <div style="display: flex;margin-bottom: 20px;">
     <button style="margin-right: 10px" class="btn btn-success" type=button onclick='myFunction()'>Запуск редактирования</button>
     <button style="margin-right: 10px" id="fixImage" class="btn btn-success" type=button >Фиксация элемента</button>
     <a id="uplodeImage" href="/storage/image/electroplating/_n64062f589e54f.jpeg" class="btn btn-success" download="image.png">Загрузка изображения</a>
  </div>
  
  
  <div style="display: none" id="boxImage1">
    
  <div style="width: 45%;margin-right: 10px;height: 400px;min-width: 200px;"> 
    <img id="image1" style="width: 100%" src="" alt="">
  </div>
  <div style="width: 45%;height: 400px;">
    <img id="upload1" style="width: 100%" src="" alt="">
  </div>
  </div> --}}
      <div class="table-responsive">
        @include('inc.message')
        <form  method="post" action="{{route('admin.personals.store')}}" enctype="multipart/form-data">
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
            
            <input type="hidden" class="form-control" name="type" id="type" value="cozyDecor">
            <div class="form-group">
              <label for="image">Фамилия имя отчество</label>
              <input type="text" style="margin: 4px;width:98%;" class="form-control" name="FIO" id="FIO" required>
            </div>
            <div class="form-group">
              <label for="image">Лицевой счет</label>
              <input type="number" style="margin: 4px;width:98%;" class="form-control" name="sub_addr" id="sub_addr" required>
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
                  @if ($i == 1)
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
      {{-- <button type="button" id="bottintest" class="btn btn-success">тест</button> --}}

      <script src="{{ asset('js/cropperjs/dist/cropper.min.js') }}"></script>
      <script type="text/javascript">
      //var croppie; 





      var croppie2;
      var image;

      function test() {
        // let boxImage1 = document.querySelector('#boxImage1');
        // boxImage1.childNodes[1].remove()
        
        // setTimeout(test2, 2000);
        const croppie = new Cropper(document.querySelector('#image1'), {
          aspectRatio: 0,
          viewMode: 0
        });


      let fixImage = document.querySelector('#fixImage');

      
      fixImage.addEventListener('click', function(){
        //alert("work");
        //alert(croppie.getCroppedCanvas().toDataURL("image/png"));
        var croppieImage = croppie.getCroppedCanvas().toDataURL("image/png");

        //alert(croppieImage);

        let upload1 = document.querySelector('#upload1');

        upload1.src = croppieImage;

        let uplodeImage = document.querySelector('#uplodeImage');

        uplodeImage.href = croppieImage;

      });
        
      }
      function myFunction() {

        // croppie.destroy();
        // croppie = 0;
      
      let boxImage1 = document.querySelector('#boxImage1');
      boxImage1.style = "width: 100%;height: 400px;margin-bottom: 50px;display: flex;";
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

      
      // const croppie = new Cropper(document.querySelector('#image1'), {
      //     aspectRatio: 0,
      //     viewMode: 0
      //   });

      // var cropper = new Croppie(document.querySelector('#image1'), {
      //     // viewport: {
      //     //       width: 150,
      //     //       height: 200
      //     //   },
      //     aspectRatio: 0,
      //     viewMode: 0

      //   });
      //   //let getCroppedCanvas = cropper.getCroppedCanvas().toBlob();
      //   //alert(cropper.getCroppedCanvas().toBlob)
      //   //alert(cropper.getCroppedCanvas().toDataURL("image/png"));

      // //let fixImage = document.querySelector('#fixImage');

      
      // document.querySelector('#fixImage').addEventListener('click', function(){
      //   alert("work");
      //   //alert(croppie.getCroppedCanvas().toDataURL("image/png"));
      //   var croppieImage = cropper.getCroppedCanvas().toDataURL("image/png");
      //   //croppie.croppie('result', 'html');

      //   alert(cropper)

      //   // alert(croppieImage);

      //   //let upload1 = document.querySelector('#upload1');

      //   //upload1.src = croppieImage;

      // });

       
     
      </script>
@endsection