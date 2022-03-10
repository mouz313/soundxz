@extends('vendor.layouts.include')

@section('content')

@toastr_css
<style type="text/css">
    td {
  text-align: center;
}
th {
  text-align: center;
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
                           
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            <section class="content-header">
            <div class="container-fluid">

                 <div class="card-header">
               <div class="float-lg-right">


                 <button type="button" class="btn btn-secondary btn-block rounded-0" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus">  </i> New Song
                </button>

            </div>

        </div>
        <div class="col-md-6">
            <div class="float-lg-right">
                <!-- Button trigger modal -->

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Song</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                               
                               <div class="card-body">
                    <form action="{{route('song.store')}}" method="post" enctype="multipart/form-data" >
                         @csrf
                 
                  	<div class="form-group">
                  		              <select id="category_id" name="category_id" class="form-control select2" required>
    
                                            <option value="">Select Category</option>
                                            @foreach($category as $row)
                                                <option value="{{$row->id}}" {{old('category_id') == $row->id ? 'selected' : ''}}>{{$row->title ?? ' '}}</option>
                                            @endforeach
                                        </select>

                        </div> 
                        <div class="form-group">
                                    <select id="album_id" name="album_id" class="form-control select2" required>
    
                                            <option value="">Select Album</option>
                                            @foreach($albums as $row)
                                                <option value="{{$row->id}}" {{old('album_id') == $row->id ? 'selected' : ''}}>{{$row->title ?? ' '}}</option>
                                            @endforeach
                                        </select>

                        </div> 
                      <div class="form-group">
                      <label for="name">Song Title</label>
                     <input type="text" class="form-control" name= "title"   id="title" placeholder=" Song Title" required>
                        </div>
	                  <div class="form-group">
	                    <label class="form-control @error('song') is-invalid @enderror">
                      <i class="fa fa-music"></i> Add Complete Song<input type="file" style="display: none;" value="{{ old('song') }}" class="form-control" required autocomplete="song"  name= "song"   id="song"  accept="audio/*" >
                        </label>
	                   
                       @error('song')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
	                   
	                  </div>
	                   <div class="form-group">

                       <label class="form-control @error('song_pre') is-invalid @enderror">
                      <i class="fa fa-headphones"></i> Add Preview Song <input type="file" style="display: none;" value="{{ old('song_pre') }}" class="form-control" required autocomplete="song_pre" name= "song_pre"   id="song_pre" accept="audio/*" >
                        </label>
	                   
	                    @error('song_pre')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
	                  </div>
                    <div class="form-group">
                     <label class="form-control @error('img') is-invalid @enderror">
                      <i class="fa fa-image"></i> Add Cover Image<input type="file" style="display: none;"name="img" class="form-control" value="{{ old('img') }}" required autocomplete="img" accept="image/png, image/gif, image/jpeg">
                        </label>
                      </div>
	                  <div class="form-group">
	                    <label class="form-control @error('filename') is-invalid @enderror">
                      <i class="fa fa-file-image"></i> Add Image Galery<input type="file" style="display: none;"name= "filename[]"  id="filename"class="form-control" value="{{ old('filename') }}" required multiple accept="image/png, image/gif, image/jpeg">
                        </label>
	                   
	                   
	                  </div>
	                  <div class="form-group">
	                   <label for="name">Description</label>
	                    <input type="text" class="form-control" name= "description"   id="Description" placeholder=" description " >
	                  </div>
              
              
                      </div>

                        <div class="col-md-12 pull-right">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                                    </div>
                        </div>
                                </form>
                    </div>
                </div>



            </div>

</div></div>

        </div>
               

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Song</h3>
                                @if ($errors->any())
                          <div class="alert alert-danger">
                         <ul>
                           @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                             @endforeach
                        </ul>
                        </div>
                           @endif
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        
                                        <th>Song</th>
                                        <th>Category</th>
                                        <th>Album</th>
                                        <th>Staus</th>
                                        <!--  $song =  AutorSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->where('id','=',$id)->first(); -->
                                        <!-- <th>Song_Preview</th> -->
                                        <th>Action</th>
                                        
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($song as $row)
                                            <tr>
                                                <td>{{$row->id ?? ''}}</td>
                                                
                                                <td>{{$row->title ?? ''}}</td>


                                                <td><?php
                                                   $category =  \App\Song::where('id','=',$row->category_id)->first();
                                                   ?>

                                                 {{$category->title ?? ''}}
                                                 </td>
                                               
                                                <td><?php
                                                   $album =  \App\AlbumSong::where('id','=',$row->album_id)->first();
                                                   ?>

                                                 {{$album->title ?? ''}}
                                                 </td>
                                               
                                                     
                                              
                                                 
                                                     <td>

                                                    @if($row->status == '1')
                                                        
                                                           <h3 class="btn btn-success">Activate</h3>
                                                    @else
                                                     <h3 class="btn btn-danger">Pending</h3>
                                                    @endif
                                                </td>
                                                  <td>
                                       
                                                <a href="{{route('song.edit', ['id' => $row->id])}}" class="btn btn-sm btn-success" title="edit"  id="{{$row->id}}" data-target="#modal-lg">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                <a href="{{route('song.destroy', ['id' => $row->id])}}" id="delete" class="btn btn-sm btn-danger" data-toggle="tooltip" title="edit">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                 <a href="{{route('song.index', ['id' => $row->id])}}" id="show" class="btn btn-sm btn-primary" data-toggle="tooltip" title="show">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                        
                                                    
                                                </td>
                                                
                                               
                                               
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                 <!-- /.modal -->

     <!--  <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="{{route('song.store')}}" method="post" enctype="multipart/form-data" >
                         @csrf
                 
                    <div class="form-group">
                                    <select id="category_id" name="category_id" class="form-control select2" required>
    
                                            <option value="">Select Category</option>
                                            
                                        </select>

                        </div> 
                        <div class="form-group">
                                    <select id="album_id" name="album_id" class="form-control select2" required>
    
                                            <option value="">Select Album</option>
                                           
                                        </select>

                        </div> 

                      <label for="name">Song Title</label>
                     <input type="text" class="form-control" name= "title"   id="title2" placeholder=" SOng Title" required>
                        </div>
                    <div class="form-group">
                     <label for="song">Song</label>
                      <input type="file" class="form-control" name= "song"   id="song2" accept="audio/*" enctype="multipart/form-data" value="" required>
                     
                    </div>
                     <div class="form-group">
                     <label for="song_pre">Song PreView</label>
                      <input type="file" class="form-control" name= "song_pre"   id="song_pre2" accept="audio/*"  required>
                     
                    </div>
                    <div class="form-group">
                     <label for="song_pre">Images</label>
                      <input type="file" class="form-control" name= "filename[]"   id="filename2"   required multiple accept="image/png, image/gif, image/jpeg" >
                     
                    </div>
                    <div class="form-group">
                     <label for="name">Description</label>
                      <input type="text" class="form-control" name= "description"   id="description22" placeholder=" description " >
                    </div>
              
              
                      </div>

                        <div class="col-md-12 pull-right">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                                    </div>
                        </div>
                                </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal --> -->
                            </div>
                            <!-- /.card-body -->
                        </div>
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

<script type="text/javascript">

 
  function reply_click(clicked_id)
  {
     
          alert(clicked_id);

          var id = clicked_id;
           $.ajax({
                method:"GET",
                url: "{{url('/song/edit')}}/"+id,
                async: false,
                success : function(response) {
                   console.log(response);
                        $.each(response, function(i, item) {
                        console.log(item.description);
                        $('#title2').val(item.title);
                        $('#song2').val(item.song);

                        $('#description22').val(item.description);
                    });

                },
                error: function() {
                    $('#option').html('<option value="">Select</option>');
                }
            });      
     
  }
</script>






   @jquery
@toastr_js
@toastr_render

@endsection
