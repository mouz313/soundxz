@extends('admin.layouts.include')

@section('content')
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
<style type="text/css">
	#center {
 
    margin-right: auto;
    padding: auto;
  width: 100%;
  
}
</style>
@toastr_css


    
 <!-- Main content -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper "  id="center">
        <!-- Content Header (Page header) -->


        <div class="content-header " >
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-6 col-9">
                        <!-- small box -->
                                 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title" >Update City</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                	<form action="{{route('city.update',['id' => $city->id])}}" method="post" enctype="multipart/form-data" >
                		 @csrf
                		 <div class="form-group">
                  		              <select id="countory_id"  name="countory_id" class="form-control select2" required>
    
                                            <option value="">Select One</option>
                                            @foreach($countory as $row)
                                                <option value="{{$row->id}}" {{ $city->countory_id == $row->id ? 'selected' : '' }} {{old('countory_id') == $row->id ? 'selected' : ''}}>{{$row->name}}</option>
                                            @endforeach
                                        </select>

                        </div> 
                  <div class="form-group">

                    <label for="title">City Name</label>
                    <input type="text" class="form-control" name= "name"  value="{{$city->name}}" id="name" placeholder="Enter Countory Name">
                  </div>
                 
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
          </div>
                       
                        </div>
                    </div>
               
                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <link type="text/css" rel="stylesheet" 
  href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<script 
  src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
</script>

  @jquery
@toastr_js
@toastr_render                       



 @endsection