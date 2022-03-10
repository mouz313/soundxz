<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <?php
      $setting =  \App\Setting::where('id','=','1')->first();
      ?>
    <!-- Brand Logo -->
    <a href="{{route('vendor.dashboard')}}" class="brand-link">
      <img src="{{ asset($setting->image ?? ' ')  }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

      <span class="brand-text font-weight-light">{{$setting->title ?? ''}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(!empty(Auth::guard('vendor')->user()->image))
          <img src="{{asset(Auth::guard('vendor')->user()->image )}}" class="img-circle elevation-2" alt="User Image">
          @else
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
         <div class="info">
         <a href="{{route('autor.profile', ['id' => Auth::guard('vendor')->user()->id])}}" class="d-block">{{ Auth::guard('vendor')->user()->name  }} </a>
        </div>
      </div>
    @php

        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        {
          $link = "https";
        }
        else
        {
          $link = "http";

          // Here append the common URL characters.
          $link .= "://";

          // Append the host(domain name, ip) to the URL.
          $link .= $_SERVER['HTTP_HOST'];

          // Append the requested resource location to the URL
          $link .= $_SERVER['REQUEST_URI'];
        }

    @endphp
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                <a href="{{route('vendor.dashboard')}}" class="nav-link {{ $link == route('vendor.dashboard') ? 'active':'' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                      Dashboard
                  </p>
                </a>
              </li>
{{--      <a href="#" class="d-block">{{Auth::user()->name}}</a>       {{ $link == route('subscription.user') ? 'active':'' }}--}}


                 <!-- <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="far fa-user nav-icon"></i>
                        <p>User</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Topics</p>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a href="{{route('country.create')}}" class="nav-link">
                       
                        <i class="nav-icon fas fa-sign-out-alt" ></i>
                        <p>Countory</p>
                    </a>
                </li> -->
                <!--  <li class="nav-item">
                    <a href="{{route('country.show')}}" class="nav-link">
                       
                        <i class="nav-icon fas fa-sign-out-alt" ></i>
                        <p>Countory </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('userlist')}}" class="nav-link">
                        <i class="far fa-user nav-icon"></i>
                        <p>User</p>
                    </a>
                </li> -->
             

            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-music"></i>
              <p>
               Songs
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                    <a href="{{route('song.show')}}" class="nav-link">
                        <i class="nav-icon fa fa-server"></i>
                        <p>All Songs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('song.pending.show')}}" class="nav-link">
                        <i class="fa fa-play nav-icon"></i>
                        <p>Pending Songs</p>
                    </a>
                </li>
                 
                </ul>
 <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-align-left"></i>
              <p>
               Albums
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              
                 <li class="nav-item">
                    <a href="{{route('song.album')}}" class="nav-link">
                       
                        <i class="nav-icon fa fa-address-card" ></i>
                        <p>All Album </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('song.pending.album')}}" class="nav-link">
                       
                        <i class="nav-icon fa fa-credit-card" ></i>
                        <p>Pending Album </p>
                    </a>
                </li>
                </ul>

              <li class="nav-item">
                    <a href="{{route('autor.profile', ['id' => Auth::guard('vendor')->user()->id])}}" class="nav-link">
                       
                        <i class="nav-icon fa fa-users" ></i>
                        <p>Profile </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('sell.song.details')}}" class="nav-link">
                       
                        <i class="nav-icon fa fa-list" ></i>
                        <p>Sell Song </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('paymant.index')}}" class="nav-link">
                       
                        <i class="nav-icon fa fa-credit-card" ></i>
                        <p> Paymant Setting </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="nav-link">
                       
                        <i class="nav-icon fas fa-sign-out-alt" ></i>
                        <p> Logout </p>
                    </a>
                </li>

           <!-- <li class="nav-item">
            <a href="" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
                                         class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
               <a href="{{ url('/logoutt') }}"> <p>
               Logout 
              </p></a>
            </a> -->

           <!--  <form id="logout-form" action="{{ url('/logoutt') }}" method="POST" style="display: none;">
              @csrf
            </form> -->
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
