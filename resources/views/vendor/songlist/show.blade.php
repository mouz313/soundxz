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
                                    	<th>User Name</th>
                                        <th>Artist Name</th>

                                        <th>Song</th>
                       
                                        
                                        <th>Price</th>

                                        <th>Created_at</th>
                                        
                                        
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                                   <?php
                                                 $user =  \App\User::where('id','=',$sell_song->user_id)->first();
                                                   ?>
                                        

                                            <tr>
                                            	<td>{{$user->name ?? ' '}}</td>
                                                <td>@if ($sell_song->autor_id != "")
                                      @foreach(explode(',', $sell_song->autor_id) as $info)
                                       <?php
                                                 $vendor_name =  \App\Vendor::where('id','=',$info)->first();
                                                   ?>
                                         <option>{{$vendor_name->name}}</option>
                                        @endforeach
                                         @endif</td>

                                         <td>@if ($sell_song->song_name != "")
                                      @foreach(explode(',', $sell_song->song_name) as $info)
                                       
                                         <option>{{$info}}</option>
                                        @endforeach
                                         @endif</td>
                                           <td>@if ($sell_song->price != "")
                                      @foreach(explode(',', $sell_song->price) as $info)
                                       
                                         <option>{{$info}}</option>
                                        @endforeach
                                         @endif</td>
                                         <td>
                                         {{$sell_song->created_at}}</td>
                                               
                                            </tr>
                                        
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
