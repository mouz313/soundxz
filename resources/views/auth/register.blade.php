
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>pulse - Music, Audio and Radio web application</title>

  
<!-- AdminLTE App -->



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
     
        <!-- brand -->
        


         <center> <img src="{{asset('images/logo.png')}}"  alt="." style="width: 150px; height: 150px;"></center>
          <!--                  <span class="hidden-folded inline">pulse</span>-->
        </a>
        <!-- / brand -->
      
   
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
  <div class="b-t">
    <div class="center-block w-xxl w-auto-xs p-y-md text-center">
      <div class="p-a-md">
        <div>
         <!--  <a href="#" class="btn btn-block indigo text-white m-b-sm">
            <i class="fa fa-facebook pull-left"></i>
            Sign up with Facebook
          </a> -->
          <a href="#" class="btn btn-block indigo text-white m-b-sm">
            <i class="fa fa-users pull-left"></i>
            Sign up with Artist+
          </a>
        </div><br><br>

       <!--  <div class="m-y text-sm">
          OR
        </div> -->
        <form method="POST" action="{{ route('vendor.register.submit') }}" enctype="multipart/form-data">
                        @csrf
          <div class="form-group">
            <input id="name" type="text" placeholder="Full Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

          </div>
          <div class="form-group">
            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>
          <div class="form-group">
            <label class="form-group @error('img') is-invalid @enderror" style="background: white; width: 100%; height: 100%; ">
                      <i class="fa fa-image"></i> Add Your CNIC or Passport or License<input id="file"  style="display: none;" type="file" class="form-control @error('img') is-invalid @enderror" name="img" value="{{ old('img') }}" required autocomplete="img" accept="image/png, image/gif, image/jpeg" ></label>


                                @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>
           <div class="form-group">
            <input id="number" type="text" placeholder="Phone Number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number">

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>
         <div class="form-group row">    
                                       <select id="countory_id" name="countory_id" class="form-control select2">
    
                                            <option value="">Select Countory</option>
                                            @foreach($data as $row)
                                                <option value="{{$row->id}}" {{old('countory_id') == $row->id ? 'selected' : ''}}>{{$row->name}}</option>
                                            @endforeach
                                        </select>
          
     </div>
     <div class="form-group">
            <select name="city_id" class="form-control" id="city_id" required>
                                           
                                          
                        </select>
          </div>

          <div class="form-group">
            <input id="address" type="text" placeholder="Address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>
          <div class="form-group">
            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>
          
          <div class="form-group">
             <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>
          <div class="m-b-md text-sm">
            <span class="text-muted">By clicking Sign Up, I agree to the</span> 
            <a href="#">Terms of service</a> 
            <span class="text-muted">and</span> 
            <a href="#">Policy Privacy.</a>
          </div>
          <button type="submit" class="btn btn-lg black p-x-lg">Sign Up</button>
        </form>
        <div class="p-y-lg text-center">
         I already have a membership?
                <a href="{{route('login')}}" class="text-primary _600">Sign in</a>
        </div>
      </div>
    </div>
  </div>
</div></div>
 <div class="form-row">
    <div class="form-group col-md-6">
      <div class="b-t">
    <div class="center-block w-xxl w-auto-xs p-y-md text-center">
      <div class="p-a-md">
        <div>
         <!--  <a href="#" class="btn btn-block indigo text-white m-b-sm">
            <i class="fa fa-facebook pull-left"></i>
            Sign up with Facebook
          </a> -->
          <a href="#" class="btn btn-block red text-white">
            <i class="fa fa-users pull-left"></i>
            Sign up with Users
          </a>
        </div><br><br>

       <!--  <div class="m-y text-sm">
          OR
        </div> -->
        <form method="POST" action="{{ route('register') }}">
                        @csrf
          <div class="form-group">
            <input id="name" type="text" placeholder="UserName" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>
          <div class="form-group">
            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>
           <div class="form-group">
            <input id="number" type="text" placeholder="Phone Number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number">

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>
         <div class="form-group row">    
                                       <select id="countory_id" name="countory_id" class="form-control select2">
    
                                            <option value="">Select Countory</option>
                                            @foreach($data as $row)
                                                <option value="{{$row->id}}" {{old('countory_id') == $row->id ? 'selected' : ''}}>{{$row->name}}</option>
                                            @endforeach
                                        </select>
          
     </div>
          <div class="form-group">
            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>
          <div class="form-group">
             <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>
          <div class="m-b-md text-sm">
            <span class="text-muted">By clicking Sign Up, I agree to the</span> 
            <a href="#">Terms of service</a> 
            <span class="text-muted">and</span> 
            <a href="#">Policy Privacy.</a>
          </div>
          <button type="submit" class="btn btn-lg black p-x-lg">Sign Up</button>
        </form>
        <div class="p-y-lg text-center">
         I already have a membership?
                <a href="{{route('login')}}" class="text-primary _600">Sign in</a>
        </div>
      </div>
    </div>
  </div>
  
</div></div>
<!-- ############ LAYOUT END-->
  </div>

<<!-- build:js scripts/app.min.js -->
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
   <script>
       
        $('#countory_id').change(function() {
          
            $('#city_id').html('<option value="">Select City</option>');
            var id = $(this).val();
            // alert(id);
            $.ajax({
                method:"GET",
                url: "{{url('/fetch/data')}}/"+id,
                async: false,
                success : function(response) {
                    // console.log(response);
                    $.each(response, function(i, item) {
                        
                        $('#city_id').append('<option value="'+item.id+'">'+item.name+'</option>');
                    });

                },
                error: function() {
                    $('#option').html('<option value="">Select</option>');
                }
            });

        });
    </script>
</body>
</html>
