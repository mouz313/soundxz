@extends('layouts.app')

@section('content')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>


    <div class="register-box" style="width: 30%;">

        <div class="card " >
            <div class="card-header text-center">
                <a href="#" class="h1" style="color: blue; font-style: italic;"><b>Registration </b></a>
            </div>
            <div class="card-body register-card-body">

               <form method="POST" action="{{ route('vendor.register.submit') }}" enctype="multipart/form-data">
                            @csrf
                    <div class="input-group mb-3">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Full Name" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                       
                       <label class="form-control @error('img') is-invalid @enderror">
                      <i class="fa fa-image"></i> Add Your CNIC or Passport or License<input type="file" style="display: none;"name="img" value="{{ old('img') }}" required autocomplete="img" accept="image/png, image/gif, image/jpeg">
                        </label>
                        @error('img')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-id-card"></span>
                            </div>
                        </div>
                       
                    </div>
                    <div class="input-group mb-3">
                        <input id="number" type="text" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" name="number" value="{{ old('phone') }}" required autocomplete="number">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas  fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select id="countory_id" name="countory_id" class="form-control">
    
                            <option value="">Select Countory</option>
                            @foreach($data as $row)
                            <option value="{{$row->id}}" {{old('countory_id') == $row->id ? 'selected' : ''}}>{{$row->name}}</option>
                            @endforeach
                    </select>
                    <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-globe" ></span>
                            </div>
                        </div>
                    </div>
                     <div class="input-group mb-3">
                       <select name="city_id" class="form-control" id="city_id" required>
                                           
                                          
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-calendar-plus-o"></span>
                            </div>
                        </div>
                    </div>
                     <div class="input-group mb-3">
                        <input id="address" type="text" placeholder="Address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-location-arrow"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input placeholder="Re-enter Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



            I already have a membership?
                <a href="{{route('vendor.login')}}" class="text-primary _600">Sign in</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>


    <script src="{{asset('/backend/js/custom.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
@endsection
