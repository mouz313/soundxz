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
                    <i class="fa fa-plus">  </i> New City
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
                                <h5 class="modal-title" id="exampleModalLabel">New City</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                               
                               <div class="card-body">
                    <form action="{{route('city.store')}}" method="post" enctype="multipart/form-data" >
                         @csrf
                 
                  	<div class="form-group">
                  		              <select id="countory_id" name="countory_id" class="form-control select2" required>
    
                                            <option value="">Select One</option>
                                            @foreach($countory as $row)
                                                <option value="{{$row->id}}" {{old('countory_id') == $row->id ? 'selected' : ''}}>{{$row->name}}</option>
                                            @endforeach
                                        </select>

                        </div> 

                    <label for="title">City Name</label>
                    <input type="text" class="form-control" name= "name"   id="name" placeholder="Enter City Name" required>
                  </div>
                  <div class="form-group">

                   
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
                                        
                                        <th>Countory Name</th>
                                        <th>City Name</th>
                                        <th>Action</th>
                                        
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($city as $row)
                                            <tr>
                                                <td>{{$row->id}}</td>
                                                <td><?php
                                                $countory =  \App\Countory::where('id','=',$row->countory_id)->first();?>
                                                 {{$countory->name}}
                                                 </td>
                                                <td>{{$row->name}}</td>
                                                
                                                <td>
                                                	 
                                                       
                                            <a href="{{route('city.edit', ['id' => $row->id])}}"  class="btn btn-sm btn-primary" data-toggle="tooltip"  title="edit" onClick="reply_click(this.id)" id="{{$row->id}}" data-target="#exampleModal1">
                                                    <i class="fa fa-pen"></i></a>
                                                     <a href="{{route('city.delete', ['id' => $row->id])}}" id="delete" class="btn btn-sm btn-danger" data-toggle="tooltip" title="edit">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                    
                                                </td>
                                                
                                               
                                               
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                 <!-- Modal -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New City</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                               
                               <div class="card-body">
                    <form action="{{route('city.store')}}" method="post" enctype="multipart/form-data" >
                         @csrf
                 
                    <div class="form-group">
                                     

                        </div> 

                    <label for="title">City Name</label>
                    <input type="text" class="form-control" name= "name"   id="name" placeholder="Enter City Name" required>
                  </div>
                  <div class="form-group">

                   
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
     

          var id = clicked_id;
           $.ajax({
                method:"GET",
                url: "{{url('/city/edit')}}/"+id,
                async: false,
                success : function(response) {
                   console.log(response);
                        $.each(response, function(i, item) {
                        console.log(item.description);
                        $('#title').val(item.title);
                       
                    });

                },
                error: function() {
                   
                }
            });      
     
  }
</script>

   @jquery
@toastr_js
@toastr_render

@endsection
