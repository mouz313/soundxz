   @extends('vendor.layouts.include')

@section('content')
<style type="text/css">
	#output_image{
 border-style: ridge;
 width: 350px;
 height: 200px;
}
</style>
@toastr_css

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- <h1>DataTables</h1> -->
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                @if(!empty(Auth::guard('vendor')->user()->image))
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset(Auth::guard('vendor')->user()->image ?? ' ')  }}"
                       alt="User profile picture">
                       @else
                        <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('assets/dist/img/user4-128x128.jpg')  }}"
                       alt="User profile picture">
                       @endif
                </div>

                <h3 class="profile-username text-center">{{Auth::guard('vendor')->user()->name  }}</h3>

                <p class="text-muted text-center">Artist</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{Auth::guard('vendor')->user()->email  }}</a>
                  </li>
                 <!--  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li> -->
                  <li class="list-group-item">
                    <b>Phone#</b> <a class="float-right">{{Auth::guard('vendor')->user()->number  }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Address</b> <a class="float-right">{{Auth::guard('vendor')->user()->address  }}</a>
                  </li>
                </ul>

               <!--  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                 {{Auth::guard('vendor')->user()->education ?? ''}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                <?php
                 $countory =  \App\Countory::where('id','=',$profile->countory_id)->first();
                 $city =  \App\City::where('id','=',$profile->city_id)->first();
                  ?>
                  

                <p class="text-muted"> {{$countory->name ?? ' '}}  {{$city->name ?? ' '}}</p>

                <hr>
               <?php
                
                 $album =  \App\AlbumSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->get();
                  ?>
                <strong><i class="fa fa-music"></i> Album </strong>

                <p class="text-muted">
                	@foreach($album as $row)
                  <span class="tag tag-danger">{{$row->title ?? ' '}} 
                  </span>
                  @endforeach

                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Bio Data</strong>

                <p class="text-muted">{{Auth::guard('vendor')->user()->description ?? ' '}}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Followers</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Albums</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                   <li class="nav-item"><a class="nav-link" href="#reset" data-toggle="tab">Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    @foreach($followers as $row)
                    <?php
                     $user =  \App\User::where('id','=',$row->user_id)->first();
                   
                  ?>
                    <div class="post">
                      <div class="user-block">
                       <!--  <img class="img-circle img-bordered-sm" src="{asset('assets/dist/img/user2-160x160.jpg')}}" alt=""> -->

                        <span class="username">
                  
                          <a href="#">{{$user->name}}</a>
                          <!-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> -->
                        </span>
                        <span class="description">{{$row->created_at}}</span>
                      </div>
                      <!-- /.user-block -->
                     
                    </div>
                    @endforeach
                    <!-- /.post -->

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                    	@foreach($album as $row)
                  
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                        {{$row->created_at->format('j F, Y')}}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>

                        <i class="fa fa-music bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i>{!! $row->created_at->format(' G:i') !!} </span>

                          <h3 class="timeline-header"><a href="#">{{$row->title ?? ' '}}</a> </h3>

                         
                          <div class="timeline-footer">
                            <a href="{{route('album.index', ['id' => $row->id])}}" class="btn btn-primary btn-sm">Song Details</a>
                            <a href="{{route('album.delete', ['id' => $row->id])}}" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                       @endforeach
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                      

                       
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        

                      
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                     
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                       

                       
                      </div>
                      <!-- END timeline item -->
                      <div>
                      
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                     <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data" >
                     @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="inputName" 
                          value="{{Auth::guard('vendor')->user()->name}}" placeholder="UserName">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email"  value="{{Auth::guard('vendor')->user()->email}}" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                     <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Countory</label>
                      <div class="col-sm-10">
                        <select id="countory_id" name="countory_id" class="form-control">
    
                            <option value="">Select Countory</option>
                            @foreach($data as $row)
                            <option value="{{$row->id}}" {{old('countory_id') == $row->id ? 'selected' : ''}}>{{$row->name}}</option>
                            @endforeach
                    </select>
                        </div>
                       </div>
                        <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">City</label>
                         <div class="col-sm-10">
                        <select name="city_id" class="form-control" id="city_id" >
                                           
                                          
                        </select>
                        </div></div>
                      
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" name="address" value=""  placeholder="Address">{{Auth::guard('vendor')->user()->address ?? ' ' }}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" value="{{Auth::guard('vendor')->user()->number}}"  name="number" placeholder="Phone">
                        </div></div>
                        <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Education</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="education" value="{{Auth::guard('vendor')->user()->education ?? ''}}"  name="education" placeholder="Enter Education">
                        </div>
                      </div>
                       <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Bio</label>
                        <div class="col-sm-10">
                        	<textarea   class="form-control"    placeholder="Enter text Bio Data... " id="description" value=""  name="description">{{Auth::guard('vendor')->user()->description }}</textarea>

                         
                        </div>
                      </div>
                       <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Profile Picture</label>
                        <div class="col-sm-10">
                        	 <input type="file"class="form-control" name="image" value=""id="imgInp"accept="image/png, image/gif, image/jpeg" onchange="preview_image(event)" />
                         
                        </div>
                      </div>
                             

                             
                       <div class="col-sm-10">
                         @if(!empty(Auth::guard('vendor')->user()->image))
                        	<img id="output_image" src="{{ asset(Auth::guard('vendor')->user()->image )  }}" />
                           @else
                        <img class="profile-user-img img-fluid "
                       src="{{ asset('assets/dist/img/user4-128x128.jpg')  }}"
                       alt="User profile picture" >
                       @endif
                         
                        </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="reset">
                    <br>
                   <!--  <center><h2  class="btn btn-primary" style="width: 40%;">RESET PASSWORD</h2></center><br><br> -->
                     <form action="{{route('setting.resset.password')}}" method="post" enctype="multipart/form-data" >
                     @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="old_password" id="old_password" 
                           placeholder="Old Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input id="password" placeholder=" New Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                          <input placeholder="Re-enter Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                </div>
                </div>
                <!-- /.tab-content -->
                 
              </div><!-- /.card-body -->

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
                url: "{{url('/city/data/')}}/"+id,
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
      <link type="text/css" rel="stylesheet" 
         
         href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<script 
  src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
</script>
<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}

</script>

     @jquery
@toastr_js
@toastr_render

@endsection