@extends('admin.layouts.include')

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
                                        <th>Autor Name</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Aprove/Block</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($album as $row)

                                            <tr>
                                                <td>{{$row->id ?? ' '}}</td>
                                                <?php
                                                 $autor =  \App\Vendor::where('id','=',$row->autor_id)->first();
                                                   ?>
                                                <td>{{$autor->name ?? ' '}}</td>
                                                <td>{{$row->title ?? ' '}}</td>
                                               <?php
                                                 $category =  \App\Song::where('id','=',$row->category_id)->first();
                                                   ?>
                                                <td>{{$category->title ?? ' '}}</td>
                                                
                                                <td>
                                                    @if($row->status == '0')
                                                        Block
                                                    @else
                                                        Approved
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($row->status == '0')
                                                        <a href="{{route('autor.song.status', ['status'=> '1', 'id' => $row->id])}}"><button class="btn btn-primary btn-sm">Approved</button></a>
                                                    @else
                                                        <a href="{{route('autor.song.status', ['status'=> '0', 'id' => $row->id])}}"> <button class="btn btn-danger btn-sm">Block</button></a>
                                                    @endif
                                                </td>
                                                <td>
                                                     <a href="{{route('song.destroy', ['id' => $row->id])}}" id="delete" class="btn btn-sm btn-danger" data-toggle="tooltip" title="edit">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                 <a href="{{route('songdetails', ['id' => $row->id])}}" id="show" class="btn btn-sm btn-primary" data-toggle="tooltip" title="show">
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
