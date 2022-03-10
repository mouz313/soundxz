<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
       <?php
      $setting =  \App\Setting::where('id','=','1')->first();
      ?>
      <img src="{{ asset($setting->image ?? ' ')  }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{$setting->title ?? ''}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(!empty(Auth::user()->image))
          <img src="{{asset(Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">
          @else
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          @endif


        </div>

         <div class="info">
          

      <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name  }} </a>
         
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
                <a href="{{route('admin.dashboard')}}" class="nav-link {{ $link == route('admin.dashboard') ? 'active':'' }}">
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


                 <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon  fa fa-globe"></i>
              <p>
                Countories
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                    <a href="{{route('country.show')}}" class="nav-link">
                       
                        <i class="nav-icon fas fa-copy " ></i>
                        <p>Countory </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('city.show')}}" class="nav-link">
                       
                        <i class="nav-icon fas fa-sign-out-alt" ></i>
                        <p>City</p>
                    </a>
                </li></ul>
                 <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Author
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
             <!--  <li class="nav-item">
                    <a href="{{route('userlist')}}" class="nav-link">
                        <i class="fa fa-user-plus nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li> -->
                 <li class="nav-item">
                    <a href="{{route('autorlist')}}" class="nav-link">
                        <i class="far fa-user nav-icon"></i>
                        <p>All Author</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('autorlistblock')}}" class="nav-link">
                        <i class="fa fa-user-times nav-icon"></i>
                        <p>Pending Author</p>
                    </a>
                </li>

              </ul>
                
                  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                    <a href="{{route('userlist')}}" class="nav-link">
                        <i class="fa fa-user-plus nav-icon"></i>
                        <p>All Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('userlistblock')}}" class="nav-link">
                        <i class="fa fa-user-times  nav-icon"></i>
                        <p>Pending Users</p>
                    </a>
                </li>
                 <!-- <li class="nav-item">
                    <a href="{{route('autorlist')}}" class="nav-link">
                        <i class="far fa-user nav-icon"></i>
                        <p>Autor</p>
                    </a>
                </li>-->
              </ul></li>

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
                    <a href="{{route('song.category')}}" class="nav-link">
                       
                        <i class="nav-icon fa fa-server" ></i>
                        <p>Category </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('autorsonglist')}}" class="nav-link">
                       
                        <i class="nav-icon fa fa-headphones" ></i>
                        <p>All  Song </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('pending.autorsonglist')}}" class="nav-link">
                       
                        <i class="nav-icon fa fa-play" ></i>
                        <p>Pending  Song </p>
                    </a>
                </li>
                
                </ul>

                 <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
               Album
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
             
                 
                 <li class="nav-item">
                    <a href="{{route('admin.song.album')}}" class="nav-link">
                       
                        <i class="nav-icon  fa fa-calendar-times" ></i>
                        <p>All Albums  </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('pending.song.album')}}" class="nav-link">
                       
                        <i class="nav-icon fa fa-calendar-plus" ></i>
                        <p>Pending Albums  </p>
                    </a>
                </li>
                </ul>

                 <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
               Paymants
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
             
                 
                 <li class="nav-item">
                    <a href="{{route('paymant.paypal')}}" class="nav-link">
                       
                        <i class="nav-icon   fa fa-envelope" ></i>
                        <p>Paypal  </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('paymant.bank.details')}}" class="nav-link">
                       
                        <i class="nav-icon fa fa fa-id-card" ></i>
                        <p>Bank Accounts </p>
                    </a>
                </li>

                 <li class="nav-item">
                    <a href="{{route('paymant.western.union')}}" class="nav-link">
                       
                        <i class="nav-icon fa fa-calendar-plus" ></i>
                        <p> Western Union </p>
                    </a>
                </li>

                </ul>

                 <li class="nav-item">
                    <a href="{{route('sell.song')}}" class="nav-link">
                       
                        <i class="nav-icon fa fa-list" ></i>
                        <p>Sell Song </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('paymant.withdraw')}}" class="nav-link">
                       
                        <i class="nav-icon  fa fa-shopping-cart" ></i>
                        <p> Withdraw </p>
                    </a>
                </li>


               

               
              <li class="nav-item">
                    <a href="{{route('setting.create')}}" class="nav-link">
                        <i class="fa fa-cogs nav-icon"></i>
                        <p>General Setting</p>
                    </a>
                </li>


           <li class="nav-item">
            <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                         class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
