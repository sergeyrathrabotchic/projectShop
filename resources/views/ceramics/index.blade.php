
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
      <div style="margin-right: 2rem;margin-left: 2rem;">
        <a class="nav-link" href="/ceramics">Керамика</a>
        <!--Доставка и оплата-->
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
    
  
  @forelse ($ceramics as $ceramic)
 
  <div class="card ceramic_item" style="width: 18rem;">
        


<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    
    @php 
        $productImages = $ceramic->productImage;
      @endphp
      @for ($i = 0;$i < count($productImages);$i++)
              @if($i == 0)
              <div class="carousel-item active">
                <img src="{{Storage::disk('image')->url($productImages[0]->image)}}" class="d-block w-100" alt="...">
              </div>
              @else
              <div class="carousel-item">
                <img src="{{Storage::disk('image')->url($productImages[$i]->image)}}" class="d-block w-100" alt="...">
              </div>
              @endif
        @endfor
    
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
            
            
          
        
        <!--<img class="card-img-top" src="..." alt="Card image cap">-->


        <div class="card-body">
          <h5 class="card-title">{{$ceramic->name}}</h5>
          <h5 class="card-title">{{$ceramic->price}}</h5>
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

</body>
</html>
