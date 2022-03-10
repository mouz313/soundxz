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
                    <div class="col-9">
                        <!-- /.card -->

                        <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <?php
      $setting =  \App\Setting::where('id','=','1')->first();
      ?>

       @if(!empty($autor->image))
          <img src="{{asset($autor->image )}}" class="profile-user-img img-fluid img-circle" alt="User Image">
          @else
          <img src="{{asset('assets/dist/img/profile.png')}}" class="profile-user-img img-fluid img-circle" alt="User Image">
          @endif
                  
                </div>

                <h3 class="profile-username text-center">{{$autor->name}}</h3>
                 <?php
      $countary =  \App\Countory::where('id','=',$autor->countory_id)->first();
      $city =  \App\City::where('id','=',$autor->city_id)->first();
      ?>
         
                <p class="text-muted text-center"><i class="fas fa-map-marker-alt mr-1"></i><b>{{$countary->name ?? ' '}}  {{$city->name ?? ' '}}<b></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$autor->email ?? ' '}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone #</b> <a class="float-right">{{$autor->number ?? ' '}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Address</b> <a class="float-right">{{$autor->address ?? ' '}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Education </b> <a class="float-right">{{$autor->education ?? ' '}}</a>
                  </li>

                   
                </ul>

                 <center><strong style=" font-size: 23px;">Paymant Method</strong></center><hr>

        @if($paymant_details!=null)
                <p class="text-muted text-center"><i class="fa fa fa-id-card"></i>    <b>  Western Union<b></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>National Card#</b> <a class="float-right">{{$paymant_details->national_card ?? ' '}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Name</b> <a class="float-right">{{$paymant_details->name ?? ' '}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone#</b> <a class="float-right">{{$paymant_details->phone ?? ' '}}</a>
                  </li>
                 

                   
                </ul>

                @endif
                @if($paymant_details!=null)
                 <p class="text-muted text-center"><i class="fa fa-envelope"></i>    <b>  Bank Account Details<b></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Bank Name</b> <a class="float-right">{{$paymant_details->bank_name ?? ' '}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Account Number</b> <a class="float-right">{{$paymant_details->account_no ?? ' '}}</a>
                  </li>
                  
                 

                   
                </ul>
                @endif
                    @if($paymant_details!=null)
                 <p class="text-muted text-center"><i class="fa fa-calendar-plus"></i>   <b>Paypall<b></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$paymant_details->email ?? ' '}}</a>
                  </li>
                 
                  
                 

                   
                </ul>
                @endif

                 <div class="text-center">
                 
                   <h5 class="btn btn-primary">BIO DATA</h5>
                </div>
                 <div class="text-center">
                 
                  <h6> {{$autor->description ?? ' '}}</h6>
                </div>

                
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
