
@extends('vendor.layouts.include')

@section('content')

@toastr_css

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$song->title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">Title</h3>
              <div class="col-12">
              	 @foreach(json_decode($song->filename , true) as $key=>$image)
              	    
                  @if($key+1==1)
                <img src="{{ asset("/images/image/".$image ?? ' ')  }}" class="product-image" alt="Product Image">
                </div>
              <div class="col-12 product-image-thumbs">
                   @else 
                   <div class="product-image-thumb active" ><img src="{{ asset("/images/image/".$image ?? ' ')  }}"></div>
                    @endif
                   @endforeach
                
                
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Category</h3>
               <?php
             $category =  \App\Song::where('id','=',$song->category_id)->first();
                ?>
              <h4>{{$category->title}}</h4>

              <hr>
              

               

              <hr>

              <div class="bg-gray py-2 px-3 mt-4">
                <h4 class="mb-0">
                  Song Preview
                </h4><br>
                <h4 class="mt-0">

                  <audio controls>
                 <source src="{{ asset($song->song_pre) }}" type="audio/mpeg"> 
                 </audio>
                </h4>
              </div>
              <div class="bg-gray py-2 px-3 mt-4">
                <h4 class="mb-0">
                  Song 
                </h4><br>
                <h4 class="mt-0">

                  <audio controls>
                 <source src="{{ asset($song->song) }}" type="audio/mpeg"> 
                 </audio>
                </h4>
              </div>

               <div class="row mt-4">
           
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
              <h3 class="my-3">Description</h3>
               
                <p>{{$song->description}}</p></div>
             
            </div>

             

              <div class="mt-4 product-share">
               <!--  <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a> -->
              </div>

            </div>
          </div>
          
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>

   @jquery
@toastr_js
@toastr_render

@endsection
