<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div>
            <img src="{{asset('images/logo.png')}}" alt="logo" class="logo-src">
        </div>
        <div class="navbar-brand">
        </div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
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
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-left">

            <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>

        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">

                                    <img width="35" class="rounded-circle" src="{{asset('images/male.png')}}" alt="">

                                  </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                     class="dropdown-menu dropdown-menu-right">
                                    <a tabindex="0" class="dropdown-item" href="">Profile</a>
                                    <a tabindex="0" class="dropdown-item" href="">Change Password</a>
                                    <a tabindex="0" class="dropdown-item" href="">Settings</a>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item"> Logout </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                {{-- {{auth()->user()->full_name}} --}}
                            </div>
                            <div class="widget-subheading">
                                {{-- {{auth()->user()->email}} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
