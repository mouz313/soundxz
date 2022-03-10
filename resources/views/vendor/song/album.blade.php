@extends('vendor.layouts.include')

@section('content')
<style type="text/css">

	td {
  text-align: center;
}
th {
  text-align: center;
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
                           
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            <section class="content-header">
            <div class="container-fluid">

                 <div class="card-header">
               <div class="float-lg-right">


                 <button type="button" class="btn btn-secondary btn-block rounded-0" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus">  </i> New Album
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
                                <h5 class="modal-title" id="exampleModalLabel">New Album</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                               
                               <div class="card-body">
                    <form action="{{route('albumstore')}}" method="post" enctype="multipart/form-data" >
                         @csrf
                 
                  	<div class="form-group">
                  	

                      <label for="name">Album Title</label>
                     <input type="text" class="form-control" name= "title"   id="title" placeholder=" ALbum Title" required>
                        </div>
	                  
	                  <div class="form-group">
	                   <label for="song_pre">Images</label>
	                    <input type="file" class="form-control" name= "image"   id="image"   required  accept="image/png, image/gif, image/jpeg" >
	                   
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
                                <h3 class="card-title">Album</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($album as $row)
                                            <tr>
                                                <td>{{$row->id}}</td>
                                                <td>{{$row->title}}</td>
                               <td><a href="{{ asset($row->image ?? ' ')  }} " data-lightbox="image-1" 
                                data-title="{{$row->title}}"> <img class="form-group "
                                 src="{{ asset($row->image ?? ' ')  }}"
                                   alt="Album Photo" style="border-radius: 20%;height: 80px;width: 80px; text-align: center;"> </a></td>
                                                   <!--  @if($row->status == '1')
                                                        <a href="{{route('autor.album.status', ['status'=> '0', 'id' => $row->id])}}"><button class="btn btn-primary btn-sm">Activate</button></a>
                                                    @else
                                                        <a href="{{route('autor.album.status', ['status'=> '1', 'id' => $row->id])}}" > <button class="btn btn-danger btn-sm">Deactivate</button></a>
                                                    @endif -->
                                                   
                                                      <td>
                                                    @if($row->status == '0')
                                                    <h3 class="btn btn-success">Activate</h3>
                                                         
                                                          
                                                    @else
                                                     <h3 class="btn btn-danger">Pending</h3>
                                                    
                                                    @endif
                                                </td>
                                                   
                                                   <td>

                                                     <a href="{{route('album.edit', ['id' => $row->id])}}" id="show" class="btn btn-sm btn-primary"  title="show">
                                                    <i class="fa fa-pen"></i></a>
                                                     <a href="{{route('album.delete', ['id' => $row->id])}}" id="delete" class="btn btn-sm btn-danger" data-toggle="tooltip" title="delete">
                                                    <i class="fa fa-times"></i></a>
                                                    <a href="{{route('album.index', ['id' => $row->id])}}" id="show" class="btn btn-sm btn-primary" data-toggle="tooltip" title="show">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div></div>
                                 <!-- /.modal -->

      
      <!-- /.modal -->
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
  <script src="{{asset('assets/dist/js/lightbox-plus-jquery.min.js')}}"></script>
<script type="text/javascript">
  function reply_click(clicked_id)
  {
     
          alert(clicked_id);           
     
  }
</script>



   @jquery
@toastr_js
@toastr_render

@endsection
