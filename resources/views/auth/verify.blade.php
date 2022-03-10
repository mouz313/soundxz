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

  <!-- endbuild -->
</head>
<body>
  <div class="app dk" id="app">

<!-- ############ LAYOUT START-->

  <div class="padding">
    <div class="navbar">
      <div class="pull-center">
        <!-- brand -->
        <a href="index.html" class="navbar-brand md">


          <img src="{{asset('images/logo.png')}}"  alt="." >
          <!--                  <span class="hidden-folded inline">pulse</span>-->
        </a>
        <!-- / brand -->
      </div>
    </div>
  </div>
  <div class="b-t">
    <div class="center-block w-xxl w-auto-xs p-y-md text-center">
      <div class="p-a-md">
        <div>
         <div class="card-header" ><h5>{{ __('Verify Your Email Address') }}</h5></div>
        </div>
        <div class="m-y text-sm">
         @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
        </div>
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                   
              
       
        </form>
       
      </div>
    </div>
  </div>

<!-- ############ LAYOUT END-->
  </div>

<!-- build:js scripts/app.min.js -->
<!-- jQuery -->
  <script src="{{asset('libs/jquery/dist/jquery.js')}}"></script>
<!-- Bootstrap -->
  <script src="{{asset('libs/tether/dist/js/tether.min.js')}}"></script>
  <script src="{{asset('libs/bootstrap/dist/js/bootstrap.js')}}"></script>
<!-- core -->
  <script src="{{asset('libs/jQuery-Storage-API/jquery.storageapi.min.js')}}"></script>
  <script src="{{asset('libs/jquery.stellar/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('libs/owl.carousel/dist/owl.carousel.min.js')}}"></script>
  <script src="{{asset('libs/jscroll/jquery.jscroll.min.js')}}"></script>
  <script src="{{asset('libs/PACE/pace.min.js')}}"></script>
  <script src="{{asset('libs/jquery-pjax/jquery.pjax.js')}}"></script>

  <script src="{{asset('libs/mediaelement/build/mediaelement-and-player.min.js')}}"></script>
  <script src="{{asset('libs/mediaelement/build/mep.js')}}"></script>
  <script src="{{asset('scripts/player.js')}}"></script>

  <script src="{{asset('scripts/config.lazyload.js')}}"></script>
  <script src="{{asset('scripts/ui-load.js')}}"></script>
  <script src="{{asset('scripts/ui-jp.js')}}"></script>
  <script src="{{asset('scripts/ui-include.js')}}"></script>
  <script src="{{asset('scripts/ui-device.js')}}"></script>
  <script src="{{asset('scripts/ui-form.js')}}"></script>
  <script src="{{asset('scripts/ui-nav.js')}}"></script>
  <script src="{{asset('scripts/ui-screenfull.js')}}"></script>
  <script src="{{asset('scripts/ui-scroll-to.js')}}"></script>
  <script src="{{asset('scripts/ui-toggle-class.js')}}"></script>
  <script src="{{asset('scripts/ui-taburl.js')}}"></script>
  <script src="{{asset('scripts/app.js')}}"></script>
  <script src="{{asset('scripts/site.js')}}"></script>
  <script src="{{asset('scripts/ajax.js')}}"></script>
</body>
</html>





