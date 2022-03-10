@extends('admin.layouts.include')

@section('content')
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
                           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Autor List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th style="text-align: center;">Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($album as $row)
                                            <tr>
                                                <td>{{$row->id}}</td>
                                                <td>{{$row->title}}</td>
                                                <?php
                                                   $author =  \App\Vendor::where('id','=',$row->autor_id)->first();
                                                   ?>
                                                 <td>{{$author->name}}
                                                 </td>
                              <td><a href="{{ asset($row->image ?? ' ')  }} " data-lightbox="image-1" 
                                data-title="{{$row->title}}"> <img class="form-group "
                                 src="{{ asset($row->image ?? ' ')  }}"
                                   alt="Album Photo" style="border-radius: 20%;height: 80px;width: 80px; text-align: center;"> </a></td>
                                                
                                                <td>
                                                    @if($row->status == '0')
                                                        Activate
                                                    @else
                                                        Deactivate
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($row->status == '0')
                                                        <a href="{{route('autor.album.status', ['status'=> '1', 'id' => $row->id])}}"><button class="btn  btn-danger btn-sm">Deactivate</button></a>
                                                    @else
                                                        <a href="{{route('autor.album.status', ['status'=> '0', 'id' => $row->id])}}" > <button class="btn btn-primary btn-sm">Activate</button></a>
                                                    @endif
                                                    <a href="{{route('song.destroy', ['id' => $row->id])}}" id="delete" data-toggle="tooltip" title="delete">
                                                   <button class="btn btn-danger btn-sm" >Delete</button>
                                                    </a>
                                                
                                                 <a href="{{route('admin.single.album', ['id' => $row->id , 'autor_id'=>$row->autor_id ])}}"  title="view">
                                                   <button class="btn btn-success btn-sm" >View</button>
                                                    </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

@endsection
