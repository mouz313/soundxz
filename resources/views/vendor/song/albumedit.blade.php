@extends('vendor.layouts.include')

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
                <h3 class="card-title" >Update Album</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                	<form action="{{route('album.update',['id' => $album->id])}}" method="post" enctype="multipart/form-data" >
                		 @csrf
                  <div class="form-group">

                    <label for="title"> Album Title</label>
                    <input type="text" class="form-control" name= "title"  value="{{$album->title}}" id="title" placeholder="Enter  Album Title">
                  </div>
                  <div class="form-group">

                    <label for="song_pre">Images</label>
	                    <input type="file" class="form-control" name= "image"  onchange="preview_image(event)" value=""  id="image"   required  accept="image/png, image/gif, image/jpeg" >
                  </div></div>
                  

                  <div class="form-group">
                   <img id="output_image" style="margin-left: 30px; width:150px; height:150px;" src="{{ asset($album->image ?? ' ')  }}" />
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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

<script type="text/javascript">
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