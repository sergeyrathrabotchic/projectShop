
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="{{ asset('assets/pages/mainCss/main.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/pages/ceramic.css') }}" rel="stylesheet" type="text/css">
  <style>
    /*#shareLink {
      display: none;
    }
  
    @media (max-width: 768px) {
      #shareLink {
        display: block;
      }
    }*/
  
    .imgShareLinkStyle:hover {
      color: #e8c015!important;
    }
  </style>
</head>
<body>
  



{{-- <div style="line-height: 23px;">Каталог</div> --}}

<div class="computerMenu">
  <div style="width: 20%">
      <img style="width: 100px" src="{{ asset('assets/media/logo/logo3.png')}}" alt="">
  </div>
  <div style="width: 60%;display: flex;justify-content: center;">
      <div style="margin-right: 2rem;margin-left: 2rem;">
        <a class="nav-link" href="/">Главная</a>
        <!--Каталог-->
      </div>
      
  </div>
  <div style="width: 20%;display: flex;justify-content: center;">
    <a   href="https://wa.me/79631450453" target="_blank" style="text-decoration: none;color: black;display: flex;">
      <img style="width: 35px;height: 35px;margin-right: 5px;" alt="Logo" src="/assets/media/staticImages/whatsapp2.png" >
    </a>
    <a   href="https://wa.me/79631450453" target="_blank" style="text-decoration: none;color: black;display: flex;">
      <img style="width: 35px;height: 35px;margin-right: 5px;" alt="Logo" src="/assets/media/staticImages/vk.png" >
    </a>
  </div>
</div>
<div >
  <nav class="navbar bg-light fixed-top phoneMenu" >
      <div class="container-fluid">
        <div>
          {{-- <button style="filter: opacity(0%);" class="navbar-toggler shadow-none"  style="border: none;outline: none;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button> --}}
          <div style="display: flex;justify-content: center;">
            <a   href="https://wa.me/79631450453" target="_blank" style="text-decoration: none;color: black;display: flex;">
              <img style="width: 35px;height: 35px;margin-right: 5px;" alt="Logo" src="/assets/media/staticImages/whatsapp2.png" >
            </a>
            <a   href="https://wa.me/79631450453" target="_blank" style="text-decoration: none;color: black;display: flex;">
              <img style="width: 35px;height: 35px;margin-right: 5px;" alt="Logo" src="/assets/media/staticImages/vk.png" >
            </a>
          </div>
        </div>
        {{-- <a class="navbar-brand" href="#">Offcanvas navbar</a> --}}
        <img style="width: 60px" src="{{ asset('assets/media/logo/logo3.png')}}" alt="">
        <button class="navbar-toggler shadow-none"  style="border: none;outline: none;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" style="background-color: #f6f0ee !important;" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('main')}}">Главная</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('ceramics')}}">Керамика</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('electroplatings')}}">Медные украшения</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('magicOfPolymer')}}">Волшебство из полимеров </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('magicOfStonesAndBead')}}">Магия Камней и Бисера</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('amulet')}}">Домовые, Обереги и Куклы</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('cozyDecor')}}">Уютный Декор</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('informations')}}">Инфо</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="{{route('ceramics')}}">Керамика</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('electroplatings')}}">Медные украшения</a>
              </li> --}}
              <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>-->
            </ul>
            <!--<form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>-->
          </div>
        </div>
      </div>
    </nav>
</div>




<div class="content">

  <div class="ceramic_container">
    
  @php
      $k = 0;
  @endphp
  @forelse ($ceramics as $ceramic)
  @php
    $k = $k + 1;
  @endphp
  <div class="card ceramic_item" style="width: 18rem;">
        


<div id="carouselExampleControls{{$k}}" class="carousel slide" data-bs-ride="true">
  <div class="carousel-inner">
    
    @php 
        $productImages = $ceramic->productImage->where('type', 'cozyDecor')->values()->reverse();
      @endphp
      @for ($i = 0;$i < count($productImages);$i++)
              @if($i == 0)
              <div class="carousel-item active" style="min-height:24rem;max-height: 24rem;" data-bs-interval="40000">
                <img src="{{Storage::disk('image')->url($productImages[0]->image)}}" class="d-block w-100" alt="...">
              </div>
              @else
              <div class="carousel-item" style="min-height: 24rem;max-height:24rem" data-bs-interval="40000">
                <img src="{{Storage::disk('image')->url($productImages[$i]->image)}}" class="d-block w-100" alt="...">
              </div>
              @endif
        @endfor
    
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{$k}}" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{$k}}" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
            
            
          
        
        <!--<img class="card-img-top" src="..." alt="Card image cap">-->


        <div class="card-body">
          <h5 class="card-title">{{$ceramic->name}}</h5>
          <h5 class="card-title">
            <div style="font-size: 27px;">{{$ceramic->price}}</div>
            <div  style="display: flex;justify-content: space-between;font-size: 26px;margin-top: -37px;">
              <div style="font-size: 27px;"></div><div style="display: flex;flex-direction: column;align-items: flex-end;font: 12px ProximaNova-Light,sans-serif;">
                <!--<img id="shareLink" src="https://stok-market.ru/image/link/link.png" style="width: 30px;" alt="test">-->
                <div id="shareLink{{$k}}" style="color: rgb(246, 240, 238); border: 1px solid rgb(220, 177, 139);background-color: rgb(220, 177, 139);border-radius: 5px;font-family: 'Open Sans';font-weight: 400;margin-right: 0px;font-size: 15px;padding: 12px;width: 100px;text-align: center;cursor: pointer;">Купить</div>
                <div id="shareLinkDiv{{$k}}" style="display: none;">
                <div>Купить</div>
                <a class="imgShareLinkStyle imgShareLink{{$k}}"  href="https://vk.com/angeli_solo" target="_blank" style="text-decoration: none;color: black;display: flex;"><img src="/assets/media/staticImages/vk.jpg" style="width: 15px;margin-right: 5px;" alt=""><div>Вконтакте</div></a>
                <a class="imgShareLinkStyle imgShareLink{{$k}}"  href="https://wa.me/79631450453" target="_blank" style="text-decoration: none;color: black;margin-top: 5px;display: flex;"><img src="/assets/media/staticImages/whatsapp.jpg" style="width: 15px;margin-right: 5px;" alt=""><div >WhatsApp</div></a>
                <br>
                <div>Поделится ссылкой</div>
                <a class="imgShareLinkStyle imgShareLink{{$k}}"  href="https://vk.com/share.php?url=" target="_blank" style="text-decoration: none;color: black;display: flex;"><img src="/assets/media/staticImages/vk.jpg" style="width: 15px;margin-right: 5px;" alt=""><div>Вконтакте</div></a>
                <a class="imgShareLinkStyle imgShareLink{{$k}}"  href="https://connect.ok.ru/offer?url=" target="_blank" style="text-decoration: none;color: black;margin-top: 5px;display: flex;"><img src="/assets/media/staticImages/odnoclas.jpg" style="width: 15px;margin-right: 5px;" alt=""><div>Одноклассники</div></a>
                <a class="imgShareLinkStyle imgShareLink{{$k}}"  style="text-decoration: none;color: black;margin-top: 5px;display: flex;" href="https://t.me/share/url?url=" target="_blank"><img src="/assets/media/staticImages/telegram.jpg" style="width: 15px;margin-right: 5px;" alt=""><div>Telegram</div></a>
                <a class="imgShareLinkStyle imgShareLink{{$k}}" href="https://wa.me/send/?text=" target="_blank" style="text-decoration: none;color: black;margin-top: 5px;display: flex;"><img src="/assets/media/staticImages/whatsapp.jpg" style="width: 15px;margin-right: 5px;" alt=""><div >WhatsApp</div></a>
              <div class="imgShareLinkStyle imgShareLink{{$k}}" id="copyLink{{$k}}" style="color: black;margin-top: 5px;cursor: pointer;display: flex;"><img src="/assets/media/staticImages/copy.jpg" style="width: 15px;margin-right: 5px;" alt="">Копировать ссылку</div></div></div>
            </div>
          </h5>
          <p class="card-text">{{$ceramic->description}}</p>
          <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
        </div>
      </div>
    </div>
    
  @empty
  @endforelse
  </div>



</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script type="text/javascript">

  let url = window.location.href;
  
  for(let k = 1;k<={{count($ceramics)}};k++)
  {
  let arr =  document.querySelectorAll('.imgShareLink' + k);
  
  let arr0 = arr[0];
  
  console.log(arr0);
  console.log(url);
  for(var i=3; i<6; i++) {
    arr[i].href = arr[i].href + url;
  }
  ////if (window.location.href == 'https://stok-market.ru/elektricheskij-duhovoj-shkaf-leran-eo-6474-bg') {
  //  alert('ghjdthrf');
  //}
  //alert('ghjdthrf');
  //console.log(document.querySelector('.imgShareLink'));
  //https://stok-market.ru/catalog/view/theme/so-emarket/images/%D0%B2%D0%BA.png
  
  let shareLink =  document.querySelector('#shareLink' + k);
  let shareLinkDiv = document.querySelector('#shareLinkDiv' + k);
  let check = 1;
  shareLink.addEventListener('click', function(e){
    //alert('правка');
    let checkShareLink = document.querySelector('.checkShareLink' + k);
    //alert(checkShareLink);
    if(!checkShareLink) {
      shareLinkDiv.style = "width: 180px;display: flex;flex-direction: column;padding: 10px;border-radius: 5px;margin-top: 20px;overflow: hidden auto;box-shadow: rgba(30, 31, 33, 0.12) 0px 5px 25px;background-color: rgb(255, 255, 255);color: rgb(21, 21, 40);";
      shareLinkDiv.classList.add("checkShareLink"  + k);
    } else {
      shareLinkDiv.style = 'display: none';
      checkShareLink.classList.remove("checkShareLink"  + k);
    }
    document.addEventListener('click', function(e){
    let checkShareLink = document.querySelector('.checkShareLink'  + k);
    if(e.target.id != 'shareLinkDiv'  + k && e.target.id != 'shareLink'  + k) {
      if(checkShareLink) {
        shareLinkDiv.style = 'display: none';
        checkShareLink.classList.remove("checkShareLink"  + k);
      }     
    }  
    },  true);
  },  true);
  
  let copyLink = document.querySelector('#copyLink'  + k);
  
  copyLink.addEventListener('click', function(){
  
    var copyTextarea = document.createElement("textarea");
    
    copyTextarea.textContent = url;
    //copyTextarea.style = "display: none;";
    document.body.appendChild(copyTextarea);

    copyTextarea.select();
    document.execCommand("copy");
    copyTextarea.style = "display: none;";
  });
  
  }
  
  </script>
</body>

</html>
