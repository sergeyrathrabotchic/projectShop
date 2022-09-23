<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link href="{{ asset('assets/pages/mainCss/main.css') }}" rel="stylesheet" type="text/css">

{{-- <div style="line-height: 23px;">Каталог</div> --}}

<div class="computerMenu">
    <div style="width: 20%">
        <img src="{{ asset('assets/media/logo/logoMain.jpg')}}" alt="">
    </div>
    <div style="width: 60%;display: flex;justify-content: center;">
        <div style="margin-right: 2rem;margin-left: 2rem;">
          Каталог
        </div>
        <div style="margin-right: 2rem;margin-left: 2rem;">
            Доставка и оплата
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
<div class="phoneMenu">
    <nav class="navbar bg-light fixed-top phoneMenu" style="margin-left: 150px;margin-right: 150px;background-color: #f6f0ee !important;">
        <div class="container-fluid">
          <div></div>
          {{-- <a class="navbar-brand" href="#">Offcanvas navbar</a> --}}
          <img src="{{ asset('assets/media/logo/logoMain.jpg')}}" alt="">
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
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
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
                </li>
              </ul>
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </div>
      </nav>
  </div>




<div class="content">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('assets/media/imegas/slaid1.jpg')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('assets/media/imegas/slaid2.jpg')}}" class="d-block w-100" alt="...">
      </div>
      {{-- <div class="carousel-item">
        <img src="{{ asset('assets/media/imegas/slaid3.jpg')}}" class="d-block w-100" alt="...">
      </div> --}}
    </div>
    </div>
</div>
  




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
