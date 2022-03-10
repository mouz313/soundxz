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
                                <h3 class="card-title">Autor List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>AutorName</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($autor as $row)
                                            <tr>
                                                <td>{{$row->id}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->email}}</td>
                                                
                                                <td>
                                                    @if($row->status == '1')
                                                        Deactivate
                                                    @else
                                                        Activate
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($row->status == '1')
                                                        <a href="{{route('autor.status', ['status'=> '0', 'id' => $row->id])}}"><button class="btn btn-primary btn-sm">Activate</button></a>
                                                    @else
                                                        <a href="{{route('autor.status', ['status'=> '1', 'id' => $row->id])}}"> <button class="btn btn-danger btn-sm">Deactivate</button></a>

                                                    @endif
                                                    <a href="{{route('autordetails', ['id' => $row->id])}}"><button class="btn btn-success btn-sm">View</button></a>

                                                     <a href="{{route('author.delete', ['id' => $row->id])}}" id="delete" class="" data-toggle="tooltip" title="edit">
                                                    <button class="btn btn-danger btn-sm"  data-toggle="tooltip" >Delete</button></a>
 
                                                     

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
