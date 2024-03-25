<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="index.html"><img src="{{asset("admin/assets")}}/images/logo.svg" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{asset("admin/assets")}}/images/logo-mini.svg" alt="logo" /></a>

    </div>

    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{asset("admin/assets")}}/images/faces/face15.jpg" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">{{Auth::user()->name}}</h5>
              <span>{{__('message.Gold Member')}}</span>
            </div>

        </div>
          <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-onepassword  text-info"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-calendar-today text-success"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
              </div>
            </a>
          </div>
        </div>
      </li>
      <div class="profile-name">
        {{-- LANG  --}}
        <div class="language-switcher" style="background: linear-gradient(to right, #ff5f6d, #ffc371);">
            @if (session()->has("lang") && session()->get("lang")=="ar")
                <li class="nav-item nav-settings d-none d-lg-block mt-3">
                    <a class="nav-link" href="{{url('change/en')}}" style="color: white">
                        English
                    </a>
                </li>
            @else
                <li class="nav-item nav-settings d-none d-lg-block mt-3">
                    <a class="nav-link " href="{{url('change/ar')}}" style="color: white">
                        Arabic
                    </a>
                </li>
            @endif
        </div>
        {{-- END LANG  --}}
      </div>
      <li class="nav-item nav-category">
        <span class="nav-link">{{__('message.Navigation')}}</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('redirect')}}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">{{__('message.Dashboard')}}</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('products')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">{{ trans('message.All Products') }}</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        {{-- <a class="nav-link" href="{{route('productCreate')}}"> --}}
        <a class="nav-link" href="{{url("products/create")}}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">{{__('message.Add New Product')}}</span>
        </a>
      </li>

    </ul>
  </nav>
