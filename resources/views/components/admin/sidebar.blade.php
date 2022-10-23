<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link @if(request())->routeIs('admin.categories.*') active @endif" aria-current="page" href="{{ route('admin.index')}}">
            <span data-feather="home"></span>
            Админка
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request())->routeIs('admin.categories.*') active @endif" href="{{route('admin.categories.index')}}">
            <span data-feather="shopping-cart"></span>
            Категории
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request())->routeIs('admin.news.*') active @endif" href="{{route('admin.news.index')}}">
            <span data-feather="users"></span>
            Новости
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request())->routeIs('admin.slides.*') active @endif" href="{{route('admin.slides.index')}}">
            <span data-feather="users"></span>
            Слайд на главной странице 
          </a>
        </li>
      </ul>

      <!--<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Saved reports</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Current month
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Last quarter
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Social engagement
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Year-end sale
          </a>
        </li>
      </ul>-->
    </div>
  </nav>