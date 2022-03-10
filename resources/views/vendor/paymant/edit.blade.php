  
@extends('vendor.layouts.include')

@section('content')
@toastr_css
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->

          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Paymant Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->


         
                <div class="card-body">
                	


                   <div class="row" >
                   	<div  class="col-md-12" style="font-size: 25px; text-align: center;" >
                   		<strong >Paypal</strong>
                   	</div> <span style="height: 7px; color: black; width: 100%;"></span>
                   	<div  class="col-md-12" style="font-size: 25px; text-align: center;" >
                   		<div><hr></div>
                   	</div> <hr>
                    <div class="col-md-4"  >
 <form action="{{route('payamnt.update', ['id' => $paymant_details->autor_id])}}" method="post" enctype="multipart/form-data" >
                		 @csrf
                  <div class="form-group" style="margin-left: 320px; margin-top: 30px;">
                    <label for="name" style="font-size: 20px; ">Email </label>
                    
                  </div></div>
                   
                  <div class="col-md-4" style="margin-top: 30px;">
                  <div class="form-group">
                   
                      <input type="email" class="form-control" name= "email" value="{{$paymant_details->email ?? ''}}"  id="email" placeholder="Please Add Email" >

                  </div></div>>
                  <div class="col-md-4"  >

                  <div class="form-group" style=" margin-left: 320px; margin-top: 30px;">
                    <label for="account_no" style="font-size: 18px; ">Paymant Status </label>
                    
                  </div></div>
                   
                  <div class="col-md-4" style=" margin-right: 180px; margin-top: 30px;">
                  <div class="form-group">
                   
                      <input type="radio" id="age1" style="width: 18px; height: 20px;" name="paymantstatus" value="PP"  {{ $paymant_details->paymantstatus == "PP" ? 'checked' : '' }} required>
  <label for="PP" style="font-size: 18px;">PAYPAL</label>
  <input type="radio" id="age2" style="width: 18px; height: 20px;"  name="paymantstatus" value="BA"  {{ $paymant_details->paymantstatus == "BA" ? 'checked' : '' }} required>
  <label for="BA" style="font-size: 18px;">BANK ACCOUNT</label>  
  <input type="radio" id="age3" style="width: 18px; height: 20px;"  name="paymantstatus" value="WU"  {{ $paymant_details->paymantstatus == "WU" ? 'checked' : '' }} required>
  <label for="WU" style="font-size: 18px;">Western Union</label>

                  </div></div>
               
                    <div class="col-md-6" style=" margin-left: 650px; margin-top: 30px;">
                  <div class="form-group">
                   @if($paymant_details->email==null)
                  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal" text-align: center;>
                    <i class="fa fa-plus">  </i> Add
                </button>



                @else
                <button type="submit" class="btn btn-success " >
                    <i class="fa fa-pen"> </i> Update
                </button>
                @endif
            </form>
	                  
                  
                  </div></div>
                   
                   
                  
                </div><hr style="height: 15px; color: black">
                 
                <div class="row" >
                    <div  class="col-md-12" style="font-size: 25px; text-align: center;" >
                      <strong >Bank Account</strong>
                      <form action="{{route('payamnt.update', ['id' => $paymant_details->autor_id])}}" method="post" enctype="multipart/form-data" >
                		 @csrf
                    </div> <span style="height: 7px; color: black; width: 100%;"></span>
                    <div  class="col-md-12" style="font-size: 25px; text-align: center;" >
                      <div><hr></div>
                    </div> <hr>
                    <div class="col-md-4"  >

                  <div class="form-group" style=" margin-left: 320px; margin-top: 30px;">
                    <label for="bank_name" style="font-size: 20px; ">Bank Name </label>
                    
                  </div></div>
                   
                  <div class="col-md-4" style=" margin-right: 80px; margin-top: 30px;">
                  <div class="form-group">
                   
                      <input type="text" class="form-control" name= "bank_name" value="{{$paymant_details->bank_name ?? ''}}"  id="bank_name" placeholder="Please Add Bank Name" >

                  </div></div>
                   <div class="col-md-4"  >

                  <div class="form-group" style=" margin-left: 250px; margin-top: 30px;">
                    <label for="account_no" style="font-size: 18px; ">Account Number/IBAN </label>
                    
                  </div></div>
                   
                  <div class="col-md-4" style=" margin-right: 80px; margin-top: 30px;">
                  <div class="form-group">
                   
                      <input type="text" class="form-control" name= "account_no" value="{{$paymant_details->account_no ?? ''}}"  id="account_no" placeholder="Please Add Account Number/IBAN" >

                  </div></div>

                   <div class="col-md-4"  >

                  <div class="form-group" style=" margin-left: 250px; margin-top: 30px;">
                    <label for="account_no" style="font-size: 18px; ">Paymant Status </label>
                    
                  </div></div>
                   
                  <div class="col-md-4" style=" margin-right: 80px; margin-top: 30px;">
                  <div class="form-group">
                   
                      <input type="radio" id="age1" style="width: 18px; height: 20px;" name="paymantstatus" value="PP"  {{ $paymant_details->paymantstatus == "PP" ? 'checked' : '' }} required>
  <label for="PP" style="font-size: 18px;">PAYPAL</label>
  <input type="radio" id="age2" style="width: 18px; height: 20px;"  name="paymantstatus" value="BA"  {{ $paymant_details->paymantstatus == "BA" ? 'checked' : '' }} required>
  <label for="BA" style="font-size: 18px;">BANK ACCOUNT</label>  
  <input type="radio" id="age3" style="width: 18px; height: 20px;"  name="paymantstatus" value="WU"  {{ $paymant_details->paymantstatus == "WU" ? 'checked' : '' }} required>
  <label for="WU" style="font-size: 18px;">Western Union</label>

                  </div></div>


                  <div class="col-md-6" style=" margin-left: 650px; margin-top: 30px;">
                  <div class="form-group">
                    @if($paymant_details->bank_name==null)
                     <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#bankaccount" text-align: center;>
                    <i class="fa fa-plus">  </i> Add
                </button>


                   @else
                    <button type="submit" class="btn btn-success " >
                    <i class="fa fa-pen"> </i> Update
                </button>
                @endif
            </form>
                  </div></div>
                   
                   
                  
                </div><hr style="height: 15px; color: black">



                 <div class="row" >
                    <div  class="col-md-12" style="font-size: 25px; text-align: center;" >

                      <strong >Western Union</strong>
                       <form action="{{route('payamnt.update', ['id' => $paymant_details->autor_id])}}" method="post" enctype="multipart/form-data" >
                		 @csrf
                    </div> <span style="height: 7px; color: black; width: 100%;"></span>
                    <div  class="col-md-12" style="font-size: 25px; text-align: center;" >
                      <div><hr></div>
                    </div> <hr>
                    <div class="col-md-4"  >

                  <div class="form-group" style=" margin-left: 320px; margin-top: 30px;">
                    <label for="national_card" style="font-size: 18px; ">National Card </label>
                    
                  </div></div>
                   
                  <div class="col-md-4" style=" margin-right: 80px; margin-top: 30px;">
                  <div class="form-group">
                   
                      <input type="text" class="form-control" name= "national_card" value="{{$paymant_details->national_card ?? ''}}"  id="national_card" placeholder="Please Add National Card " >

                  </div></div>
                   <div class="col-md-4"  >

                  <div class="form-group" style=" margin-left: 320px; margin-top: 30px;">
                    <label for="name" style="font-size: 20px; ">Name </label>
                    
                  </div></div>
                   
                  <div class="col-md-4" style=" margin-right: 80px; margin-top: 30px;">
                  <div class="form-group">
                   
                      <input type="text" class="form-control" name= "name" value="{{$paymant_details->name ?? ''}}"  id="name" placeholder="Please Add Name" >

                  </div></div>
                   <div class="col-md-4"  >

                  <div class="form-group" style=" margin-left: 320px; margin-top: 30px;">
                    <label for="phone" style="font-size: 20px; ">Phone # </label>
                    
                  </div></div>
                   
                  <div class="col-md-4" style=" margin-right: 80px; margin-top: 30px;">
                  <div class="form-group">
                   
                      <input type="text" class="form-control" name= "phone" value="{{$paymant_details->phone ?? ''}}"  id="phone" placeholder="Please Add Phone 
                      " >

                  </div></div>
                  <div class="col-md-4"  >

                  <div class="form-group" style=" margin-left: 250px; margin-top: 30px;">
                    <label for="phone" style="font-size: 20px; "> Paymant Status </label>
                    
                  </div></div>
                   
                  <div class="col-md-4" style=" margin-right: 80px; margin-top: 30px;">
                  <div class="form-group">
                   
                      <input type="radio" id="age1" style="width: 18px; height: 20px;" name="paymantstatus" value="PP"  {{ $paymant_details->paymantstatus == "PP" ? 'checked' : '' }} required>
  <label for="PP" style="font-size: 18px;">PAYPAL</label>
  <input type="radio" id="age2" style="width: 18px; height: 20px;"  name="paymantstatus" value="BA"  {{ $paymant_details->paymantstatus == "BA" ? 'checked' : '' }} required>
  <label for="BA" style="font-size: 18px;">BANK ACCOUNT</label>  
  <input type="radio" id="age3" style="width: 18px; height: 20px;"  name="paymantstatus" value="WU"  {{ $paymant_details->paymantstatus == "WU" ? 'checked' : '' }} required>
  <label for="WU" style="font-size: 18px;">Western Union</label>

                  </div></div>

                  <div class="col-md-6" style=" margin-left: 650px; margin-top: 30px;">

                  <div class="form-group">
                   @if($paymant_details->national_card==null)
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#westernnionModal" text-align: center;>
                    <i class="fa fa-plus">  </i> Add
                </button>
                @else
                 <button type="submit" class="btn btn-success " >
                    <i class="fa fa-pen"> </i> Update
                </button>
                @endif
            </form>
                  </div></div>
                   
                   
                  
                </div>
                </div>
               
              </form>
            </div>
            <!-- /.card -->
            </div>


            <div class="col-md-6">
            <div class="float-lg-right">
                <!-- Button trigger modal -->

                <!-- Modal no 1-->


                <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
        <h4 class="modal-title" style="float: right;"> Paypall</h4>
          <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
      </div>
     
      <div class="modal-body">
                               
                               <div class="card-body">
                    <form action="{{route('paymant.details')}}" method="post" enctype="multipart/form-data" >
                         @csrf
                 
                    <div class="form-group">
                    

                      <label for="email"> Email</label>
                     <input type="text" class="form-control" name= "email"  value="" id="email" placeholder="Please Add Email" required>
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
      
    </div>

  </div>
</div>

         
            <!-- Modal End  -->


            <!-- Modal no 2 -->

            <!-- Modal -->
<div id="bankaccount" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="float: right;"> Bank Account Details</h4>
          <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
                               
                               <div class="card-body">
                    <form action="{{route('paymant.details')}}" method="post" enctype="multipart/form-data" >
                         @csrf
                 
                    <div class="form-group">
                    

                      <label for="bank_name"> Bank Name</label>
                     <input type="text" class="form-control" name= "bank_name"   id="bank_name" placeholder="Please Add Bank Name" required>
                        </div>
                    
                     <div class="form-group">
                    

                      <label for="account_no"> Account Number </label>
                     <input type="text" class="form-control" name= "account_no"   id="account_no" placeholder="Please Add Bank Name" required>
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
     
    </div>

  </div>
</div>

               
            <!-- Modal End  -->


            <!-- Modal no 3 -->
                <div class="modal fade" id="westernnionModal" tabindex="-1" role="dialog" aria-labelledby="westernnionModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="westernnionModalLabel">Western Union</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                               
                               <div class="card-body">
                    <form action="{{route('paymant.details')}}" method="post" enctype="multipart/form-data" >
                         @csrf
                 
                    <div class="form-group">
                    

                      <label for="national_card"> National Card</label>
                     <input type="text" class="form-control" name= "national_card"   id="national_card" placeholder="Please Add National Card" required>
                        </div>
                    
                     <div class="form-group">
                    

                      <label for="name"> Name </label>
                     <input type="text" class="form-control" name= "name"   id="name" placeholder="Please Add Bank Name" required>
                        </div>

                        <div class="form-group">
                    

                      <label for="phone"> Phone # </label>
                     <input type="text" class="form-control" name= "phone"   id="phone" placeholder="Please Add Phone#" required>
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
            <!-- Modal End  -->
         
        </div>
       
      </div>
    </section>
   
  </div>
  <!-- /.content-wrapper -->



 
  @jquery
@toastr_js
@toastr_render                       



 @endsection