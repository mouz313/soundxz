  @extends('vendor.layouts.include')

@section('content')
@toastr_css
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Song</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->


          <form action="{{route('song.update',['id' => $song->id])}}" method="post" enctype="multipart/form-data" >
                		 @csrf
                <div class="card-body">
                   <div class="row">
                    <div class="col-md-6">
                  <div class="form-group">
                    <label for="name"> Song Title</label>
                    <input type="text" name="title" class="form-control" value="{{$song->title}}" id="title" placeholder="Enter Title">
                  </div></div>
                   <div class="col-md-6">
                  <div class="form-group">
                  	<label for="name"> Countory</label>
                     <select id="category_id" name="category_id" class="form-control select2" required>
    
                                            <option value="">Select Category</option>
                                            @foreach($category as $row)
                                                <option value="{{$row->id}}" {{ $song->category_id == $row->id ? 'selected' : '' }}  {{old('category_id') == $row->id ? 'selected' : ''}}>{{$row->title ?? ' '}}</option>
                                            @endforeach
                                        </select>
                  </div></div>
                  <div class="col-md-6">
                  <div class="form-group">
                  	<label for="name"> Album</label>
                     <select id="album_id" name="album_id" class="form-control select2" required>
    
                                            <option value="">Select Album</option>
                                            @foreach($albums as $row)
                                                <option value="{{$row->id}}" {{ $song->album_id == $row->id ? 'selected' : '' }} {{old('album_id') == $row->id ? 'selected' : ''}}>{{$row->title ?? ' '}}</option>
                                            @endforeach
                                        </select>
                  </div></div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="song_pre">Cover Image</label>
                      <input type="file" value="Upload Publication" class="form-control" value="{{$song->img}}"  name= "img"   id="img"   required multiple accept="image/png, image/gif, image/jpeg" >
                  </div></div>
                   <div class="col-md-6">
                  <div class="form-group">
                    <label for="song_pre">Galery Images</label>
	                    <input type="file" class="form-control" name= "filename[]"   id="filename"   required multiple accept="image/png, image/gif, image/jpeg" >
                  </div></div>
                   <div class="col-md-6">
                  <div class="form-group">
                     <label for="name">Description</label>
	                    <input type="text" class="form-control" name= "description" value="{{$song->description}}"  id="description" placeholder=" description " >
                  </div></div>
                   
                  
                </div>
                 
                
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <center><button type="submit" class="btn btn-primary" style="width:50%; text-align: center;">
                  Submit</button></center>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
       
      </div><
    </section>
   
  </div>
  <!-- /.content-wrapper -->


 
  @jquery
@toastr_js
@toastr_render                       



 @endsection