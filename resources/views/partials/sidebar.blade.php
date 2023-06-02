<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
      <div class="logo-src"></div>
      <div class="header__pane ml-auto">
        <div>
          <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </div>
    </div>
    <div class="app-header__mobile-menu">
      <div>
        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      </div>
    </div>
    <div class="app-header__menu">
      <span>
        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
          <span class="btn-icon-wrapper">
            <i class="fa fa-ellipsis-v fa-w-6"></i>
          </span>
        </button>
      </span>
    </div>
    <div class="scrollbar-sidebar">
      <div class="app-sidebar__inner">

        <div class="profilePicture">
          <img src="" alt="profilePicture">
        </div>
        <div class="text-center mb-4 mt-3">
          <h4>
              <b> Sheraz Howlader </b> <br>
          </h4>
          <h6>
              Admin
          </h6>
        </div>

        <ul class="vertical-nav-menu">
          <li class="app-sidebar__heading"> Dashboard </li>
          <li>
            <a href="" class="">
              <i class="metismenu-icon fas fa-hammer"></i>
                Dashboard
            </a>
          </li>
          <li class="app-sidebar__heading"> Category </li>
          <li>
            <a href="{{route('category.index')}}" class="{{Request::is('category') ? 'mm-active': ''}}">
              <i class="metismenu-icon fas fa-hand-holding-usd"></i>
              Category
            </a>
          </li>
        </ul>
      </div>
      <!-- for scroll sidebar -->
      <div class="scroll-area-sm">
        <div class="scrollbar-container">
            <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">

            </ul>
        </div>
      </div>
    </div> <!-- End scrollbar-sidebar -->
  </div>
