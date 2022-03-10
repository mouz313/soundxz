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
                                        <th>Invoice Id</th>
                                        <th>User Name</th>
                       
                                        
                                        <th>SubTotal</th>
                                        <th>Created_at</th>
                                        <th>Details</th>
                                        
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sell as $row)

                                            <tr>
                                                <td>{{$row->invoice_id ?? ' '}}</td>
                                                <?php
                                                 $user =  \App\User::where('id','=',$row->user_id)->first();
                                                   ?>
                                                <td>{{$user->name ?? ' '}}</td>
                                                <td>${{$row->subtotal ?? ' '}}</td>
                                              
                                                <td>{{$row->created_at ?? ' '}}</td>
                                                
                                                
                                                <td>
                                                     
                                                 <a href="{{route('sell.song.show', ['id' => $row->id])}}" id="show" class="btn btn-sm btn-primary" data-toggle="tooltip" title="show">
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
