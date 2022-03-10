<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>pulse - Music, Audio and Radio web application</title>
  <meta name="description" content="Music, Musician, Bootstrap" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="{{asset('images/logo.png')}}">
  
  <!-- style -->
  <link rel="stylesheet" href="{{asset('css/animate.css/animate.min.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('css/glyphicons/glyphicons.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('css/material-design-icons/material-design-icons.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('css/bootstrap/dist/css/bootstrap.min.css')}}" type="text/css" />

  <!-- build:css css/styles/app.min.css -->
  <link rel="stylesheet" href="{{asset('css/styles/app.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('css/styles/style.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('css/styles/font.css')}}" type="text/css" />
  
  <link rel="stylesheet" href="{{asset('libs/owl.carousel/dist/assets/owl.carousel.min.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('libs/owl.carousel/dist/assets/owl.theme.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('libs/mediaelement/build/mediaelementplayer.min.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('libs/mediaelement/build/mep.css')}}" type="text/css" />


  <!-- playe list -->


  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">


  <!-- END -->
       

  <!-- endbuild -->
</head>
<body>
  <div class="app dk" id="app">

<!-- ############ LAYOUT START-->

  <!-- aside -->
  <div id="aside" class="app-aside modal fade nav-dropdown">
    <!-- fluid app aside -->
    <div class="left navside grey dk" data-layout="column">
      <div class="navbar no-radius">
        <!-- brand -->
		  <a href="#" style="max-width: 100px; width: 200px"  class=" ">
      <?php
      $setting =  \App\Setting::where('id','=','1')->first();
      ?>

			  <img src="{{ asset($setting->image ?? ' ')  }}" style="max-width: 100px; width: 200px"  alt="." >
			  <!--              	<span class="hidden-folded inline">pulse</span>-->
		  </a>
        <!-- / brand -->
      </div>
      <div data-flex class="hide-scroll">
          <nav class="scroll nav-stacked nav-active-primary">
            
            <ul class="nav" data-ui-nav>
              <li class="nav-header hidden-folded">
                <span class="text-xs text-muted"><h5>{{$setting->title ?? ''}}</h5></span>
              </li>
              <li>
                <a href="{{ route('/') }}">
                  <span class="nav-icon">
                    <i class="material-icons">
                      play_circle_outline
                    </i>
                  </span>
                  <span class="nav-text">Discover</span>
                </a>
              </li>
             <!--  <li>
                <a href="{{ route('browser') }}">
                  <span class="nav-icon">
                    <i class="material-icons">
                      sort
                    </i>
                  </span>
                  <span class="nav-text">Browse</span>
                </a>
              </li> -->
             <!--  <li>
                <a href="{{ route('chart') }}">
                  <span class="nav-icon">
                    <i class="material-icons">
                      trending_up
                    </i>
                  </span>
                  <span class="nav-text">Charts</span>
                </a>
              </li> -->
              <li>
                <a href="{{ route('artist') }}">
                  <span class="nav-icon">
                    <i class="material-icons">
                      portrait
                    </i>
                  </span>
                  <span class="nav-text">Artist</span>
                </a>
              </li>
              <li>
                <a href="{{ route('search') }}">
                  <span class="nav-icon">
                    <i class="material-icons">
                      search
                    </i>
                  </span>
                  <span class="nav-text">Search Song</span>
                </a>
              </li>
              
              <li class="nav-header hidden-folded m-t">
                <span class="text-xs text-muted">Your collection</span>
              </li>
              

             <!--  <li>
                <a href="{{ route('tracks') }}">
                  <span class="nav-label">
                    <b class="label">8</b>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">
                      list
                    </i>
                  </span>
                  <span class="nav-text">Tracks</span>
                </a>
              </li> -->
               @auth
              <?php
      $playlist =  \App\SellSOng::where('user_id','=',Auth::user()->id)->get();
      $likes   =    \App\Like::where('user_id','=',Auth::user()->id)->where('like','=',1)->get();
      ?>
             
              <li>
                <a href="{{ route('playList') }}">
                  <span class="nav-label">
                    <b class="label">{{$playlist->count() ?? ' 0'}}</b>
                  </span>
                  <span class="nav-icon">
                   <i class="material-icons">
                      queue_music
                    </i>
                  </span>
                  <span class="nav-text">Playlists</span>
                </a>
              </li>

               <li>
                <a href="{{ route('likes') }}">
                  <span class="nav-label">
                    <b class="label">{{$likes->count() ?? ' 0'}}</b>
                  </span>
                  <span class="nav-icon">
                   <i class="material-icons">
                      favorite_border
                    </i>
                  </span>
                  <span class="nav-text">Likes</span>
                </a>
              </li>

              
              <li>
                <a href="{{ route('cart.show') }}">
                  <span class="nav-label">
                    <b class="label">{{$count ?? '0 '}}</b>
                  </span>
                  <span class="nav-icon">
                    <i class="fa fa-cart-plus">
                      
                    </i>
                  </span>
                  <span class="nav-text">Cart</span>
                </a>
              </li>
             <!--  <li>
                <a href="{{ route('userprofile') }}">
                  <span class="nav-icon">
                    <i class=" fa fa-users">
                     
                    </i>
                  </span>
                  <span class="nav-text">Profile</span>
                </a>
              </li> -->
              <li>
                <a href="{{ route('profile') }}">
                  <span class="nav-icon">
                    
                    <i class="fa fa-users">
                      
                    </i>
                  </span>
                  <span class="nav-text">Profile</span>
                </a>
              </li>
              <li>
                <a href="{{ route('logoutt') }}">
                  <span class="nav-icon">
                    
                    <i class="material-icons">
                      portrait
                    </i>
                  </span>
                  <span class="nav-text">Logout</span>
                </a>
              </li>
              @else
               <li>
                <a href="{{ route('login') }}">
                  <span class="nav-icon">
                    
                    <i class="fa fa-user">
                      
                    </i>
                  </span>
                  <span class="nav-text"> Login</span>
                </a>
              </li>
               <li>
                <a href="{{ route('register') }}">
                  <span class="nav-icon">
                    
                    <i class="fa fa-users">
                      
                    </i>
                  </span>
                  <span class="nav-text">Register</span>
                </a>
              </li>
              
@endauth
            </ul>
          </nav>
      </div>
      
      @auth
      <div data-flex-no-shrink>
        <div class="nav-fold dropup">
          <a data-toggle="dropdown">
              <span class="pull-left">
                <img src="{{asset('images/a3.jpg')}}" alt="..." class="w-32 img-circle">
              </span>
              <span class="clear hidden-folded p-x p-y-xs" style="margin-bottom: 40px;">

                <span class="block _500 text-ellipsis"> {{AUth::user()->name}}</span>
              </span>
          </a>
          <div class="dropdown-menu w dropdown-menu-scale ">
            <a class="dropdown-item" href="{{ route('profile') }}">
              <span>Profile</span>
            </a>
            <a class="dropdown-item" href="{{ route('/') }}">
              <span>Tracks</span>
            </a>
            <a class="dropdown-item" href="{{ route('playList') }}">
              <span>Playlists</span>
            </a>
            <a class="dropdown-item" href="{{ route('likes') }}">
              <span>Likes</span>
            </a>
            <div class="dropdown-divider"></div>
            <!-- <a class="dropdown-item" href="{{asset('')}}docs.html">
              Need help?
            </a> -->
            <a class="dropdown-item" href="{{ route('logoutt') }}">Sign out</a>
          </div>
        </div>
        @else
       
        @endauth

        
      </div>
    </div>
  </div>
  <!-- / -->




  <!-- content -->
  <div id="content" class="app-content white bg box-shadow-z2" role="main">
    <div class="app-header hidden-lg-up white lt box-shadow-z1">
        <div class="navbar">
        <!-- brand -->
        <a href="#" class="navbar-brand md">
        	<svg xmlns="'http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">
        		<circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)"/>
        		<circle cx="24" cy="24" r="22" fill="#1c202b" class="brand-color"/>
        		<circle cx="24" cy="24" r="10" fill="#ffffff"/>
        		<circle cx="13" cy="13" r="2"  fill="#ffffff" class="brand-animate"/>
        		<path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF" />
        		<circle cx="24" cy="24" r="3" fill="#000000"/>
        	</svg>
        
        	<img src="{{asset('images/logo.png')}}" alt="." class="hide">
        	<span class="hidden-folded inline">pulse</span>
        </a>
        <!-- / brand -->
        <!-- nabar right -->
        <ul class="nav navbar-nav pull-right">
          <li class="nav-item">
            <!-- Open side - Naviation on mobile -->
            <a data-toggle="modal" data-target="#aside" class="nav-link">
              <i class="material-icons">menu</i>
            </a>
            <!-- / -->
          </li>
        </ul>
        <!-- / navbar right -->
      </div>
    </div>