
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="{{ asset('assets/pages/mainCss/main.css') }}" rel="stylesheet" type="text/css">

  <style>
    

    @media (max-width: 600px) { 
      .desktop {
        display: none !important;
      }
    }
    @media (min-width: 600px) { 
      .mobil {
        display: none !important;
      }
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
      </div>
      <div style="margin-right: 2rem;margin-left: 2rem;">
        <a class="nav-link" href="/ceramics">Керамика</a>
      </div>
      <div style="margin-right: 2rem;margin-left: 2rem;">
          Контакты
      </div>
  </div>
  <div style="width: 20%;display: flex;justify-content: center;">
      <div>
          <img style="width: 33px;height: 33px;margin-right: 5px;" alt="Logo" src="/assets/media/svg/phone.svg" >
      </div>
      <div>
          <img style="width: 35px;height: 35px;margin-right: 5px;" alt="Logo" src="/assets/media/svg/telegram.svg" >
      </div>
      <div>
          <img style="width: 35px;height: 35px;margin-right: 5px;" alt="Logo" src="/assets/media/svg/whatsapp.svg" >
      </div>
  </div>
</div>
<div >
  <nav class="navbar bg-light fixed-top phoneMenu" >
      <div class="container-fluid">
        <div>
          <button style="filter: opacity(0%);" class="navbar-toggler shadow-none"  style="border: none;outline: none;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
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




<div class="content" >
  <div style="display: flex;justify-content: center;">
  <div id="carouselExampleSlidesOnly" style="max-height:50vh;" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @for ($i = 0; $i < count($slides); $i++)
        @if ($i == 0)
          <div class="carousel-item active">
            <img style="border-radius: 1rem;" src="{{Storage::disk('image')->url($slides[0]->image)}}" class="d-block w-100" alt="...">
          </div>     
        @else
          <div class="carousel-item ">
            <img style="border-radius: 1rem;" src="{{Storage::disk('image')->url($slides[$i]->image)}}" class="d-block w-100" alt="...">
          </div>   
        @endif
        
      @endfor
      {{-- @foreach ($slides as $slide)
        <div class="carousel-item active">
          <img style="border-radius: 1rem;" src="{{Storage::disk('image')->url($slide->image)}}" class="d-block w-100" alt="...">
        </div>
      @endforeach --}}
      {{-- <div class="carousel-item active">
        <img style="border-radius: 1rem;" src="{{ asset('assets/media/imegas/slaid1.jpg')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img style="border-radius: 1rem;" src="{{ asset('assets/media/imegas/slaid2.jpg')}}" class="d-block w-100" alt="...">
      </div> --}}
      {{-- <div class="carousel-item">
        <img src="{{ asset('assets/media/imegas/slaid3.jpg')}}" class="d-block w-100" alt="...">
      </div> --}}
    </div>
  </div>
  </div>

  {{-- <div style="width: 100%;background-color: #2267a0;aspect-ratio: 2 / 1;">

  </div> --}}

  <div class="desktop" style="display: flex;margin-top: 50px;width: 100%;">
    <div style="width: 40%;">  
      <a class="nav-link" href="/ceramics"><div style="display: flex;align-items: center;justify-content: center;background: #e7ceb7;width: 97.5%;aspect-ratio: 2 / 1;margin: 5%;;margin-left: 0px;margin-right: 2.5%;">
        <div>Керамика</div>
      </div></a>
      <div style="display: flex">
        {{-- <a  href="/ceramics" style=""> --}}
          <div href="/ceramics" onclick="AmuletController()" style="cursor: pointer;text-align: center;display: flex;align-items: center;justify-content: center;background: #b4bec6;width: 46.25%;aspect-ratio: 1 / 1;margin-right: 2.5%;">
            <div>Домовые, Обереги и Куклы</div>
          </div>
        {{-- </a> --}}
        <div onclick="MagicOfPolymerController()" style="cursor: pointer;text-align: center;display: flex;align-items: center;justify-content: center;background: #e7ceb7;width: 46.25%;aspect-ratio: 1 / 1;margin-left: 2.5%;margin-right: 2.5%;">
          <div>Волшебство из полимеров</div>
        </div>
      </div>
    </div>
    <div style="width: 20%;">
      <div style="background: #e7ceb7;aspect-ratio: 1 / 2.22;width: 90%;margin:5%;margin-top: 10%;">
      </div>
    </div>
    <div style="width: 40%;">
      <div style="display: flex">
        <div onclick="MagicOfStonesAndBeadController()" style="cursor: pointer;text-align: center;display: flex;align-items: center;justify-content: center;background: #b4bec6;width: 46.25%;aspect-ratio: 1 / 1;margin-left: 2.5%;margin-right: 2.5%;margin-top: 5%;">
          <div>Магия Камней и Бисера</div>
        </div>
        <div onclick="CozyDecorController()" style="cursor: pointer;text-align: center;display: flex;align-items: center;justify-content: center;background: #e7ceb7;width: 46.25%;aspect-ratio: 1 / 1;margin-left: 2.5%;margin-top: 5%;">
          <div>Уютный Декор</div>
        </div>
      </div>
      <a class="nav-link" href="/electroplatings"><div style="background: #e7ceb7;width: 97.5%;aspect-ratio: 2 / 1;margin-left: 2.5%;margin-top: 5%;display: flex;align-items: center;justify-content: center;"><div style="text-align: center">Медные<br>украшения</div></div></a>  
    </div>
  </div>

  <div class="mobil" style="width: 100%;">
    <a class="nav-link" href="/ceramics"><div style="display: flex;align-items: center;justify-content: center;background: #e7ceb7;width: 100%;aspect-ratio: 3 / 1;margin: 5%;;margin-left: 0px;margin-right: 2.5%;">
      <div>Керамика</div>
    </div></a>
    <a class="nav-link" href="/electroplatings"><div style="display: flex;align-items: center;justify-content: center;background: #b4bec6;width: 100%;aspect-ratio: 3 / 1;margin: 5%;;margin-left: 0px;margin-right: 2.5%;">
      <div>Медные украшения</div>
    </div></a>
    <a class="nav-link" href="/amulet"><div style="display: flex;align-items: center;justify-content: center;background: #e7ceb7;width: 100%;aspect-ratio: 3 / 1;margin: 5%;;margin-left: 0px;margin-right: 2.5%;">
      <div>Домовые, Обереги и Куклы</div>
    </div></a>
    <a class="nav-link" href="/magicOfPolymer"><div style="display: flex;align-items: center;justify-content: center;background: #b4bec6;width: 100%;aspect-ratio: 3 / 1;margin: 5%;;margin-left: 0px;margin-right: 2.5%;">
      <div>Волшебство из полимеров</div>
    </div></a>
    <a class="nav-link" href="/magicOfStonesAndBead"><div style="display: flex;align-items: center;justify-content: center;background: #e7ceb7;width: 100%;aspect-ratio: 3 / 1;margin: 5%;;margin-left: 0px;margin-right: 2.5%;">
      <div>Магия Камней и Бисера</div>
    </div></a>
    <a class="nav-link" href="/cozyDecor"><div style="display: flex;align-items: center;justify-content: center;background: #b4bec6;width: 100%;aspect-ratio: 3 / 1;margin: 5%;;margin-left: 0px;margin-right: 2.5%;">
      <div>Уютный Декор</div>
    </div></a>
    
  
  </div>

</div>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


<script type="text/javascript">
function AmuletController(){
  window.location.href = "/amulet";
}
function CozyDecorController(){
  window.location.href = "/cozyDecor";
}
function MagicOfPolymerController(){
  window.location.href = "/magicOfPolymer";
}
function MagicOfStonesAndBeadController(){
  window.location.href = "/magicOfStonesAndBead";
}




</script>
</body>
</html>
