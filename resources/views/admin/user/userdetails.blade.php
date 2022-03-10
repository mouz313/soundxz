@extends('admin.layouts.include')

@section('content')
<style type="text/css">
  #center {
  margin-right: 100px;
  margin-top: auto;
  width: 60%;
  
  padding: 20px;
}
</style>
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
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

         <section class="content" >
            <div class="container-fluid" id="center">
                <div class="row">
                    <div class="col-6">
                        <!-- /.card -->

                        <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <?php
      $setting =  \App\Setting::where('id','=','1')->first();
                   ?>

                @if(!empty($user->image))
          <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset($user->image ??' assets/dist/img/user2-160x160.jpg')  }}"
                       alt="User profile picture">
          @else
          <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('assets/dist/img/profile.png')}}"
                       alt="User profile picture">
         
          @endif
                  
                </div>

                <h3 class="profile-username text-center">{{$user->name ?? ' '}}</h3>
                 <?php
      $countary =  \App\Countory::where('id','=',$user->countory_id)->first();
     
      ?>
         
                <p class="text-muted text-center"><i class="fas fa-map-marker-alt mr-1"></i><b>{{$countary->name ?? ' '}}  <b></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$user->email ?? ' '}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone#</b> <a class="float-right">{{$user->number ?? ' '}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Status</b> <a class="float-right">@if($user->status=='0')
                    Activated
                    @else
                    Block
                    @endif
                  </a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>-</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
