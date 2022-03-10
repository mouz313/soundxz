@extends('vendor.layouts.include')

@section('content')
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
                                <h3 class="card-title">Sigle Album Song List</h3>
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
                                        @foreach($album as $row)
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

 @jquery
@toastr_js
@toastr_render

@endsection
