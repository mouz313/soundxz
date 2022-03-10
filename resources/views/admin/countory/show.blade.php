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
                           
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            <section class="content-header">
            <div class="container-fluid">

                              <div class="card-header">
               <div class="float-lg-right">


                 <button type="button" class="btn btn-secondary btn-block rounded-0" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus">  </i> New Country
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
                                <h5 class="modal-title" id="exampleModalLabel">New Country</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                               
                               <div class="card-body">
                    <form action="{{route('country.store')}}" method="post" enctype="multipart/form-data" >
                         @csrf
                  <div class="form-group">

                    <label for="title">Country Name</label>
                    <input type="text" class="form-control" name= "name"   id="name" placeholder="Enter Countory Name" required>
                  </div>
                  <div class="form-group">

                    <label for="title">Code</label>
                    <input type="text" class="form-control" name= "code"   id="code" placeholder="Enter Countory COde" required>
                  </div>
                  
                <!-- /.card-body -->

               
              
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
                                <h3 class="card-title">Countory Name</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Action</th>
                                        
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($countory as $row)
                                            <tr>
                                                <td>{{$row->id}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->code}}</td>
                                                <td>
                                                	 
                                                        
                                                    
                                                 <a href="{{route('country.edit', ['id' => $row->id])}}" id="show" class="btn btn-sm btn-primary" data-toggle="tooltip" title="show">
                                                    <i class="fa fa-pen"></i></a>
                                                     <a href="{{route('country.delete', ['id' => $row->id])}}" id="delete" class="btn btn-sm btn-danger" data-toggle="tooltip" title="edit">
                                                    <i class="fa fa-times"></i>
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
