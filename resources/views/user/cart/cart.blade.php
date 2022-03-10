
@extends('user.layouts.include')

@section('content')

@toastr_css
<style type="text/css">
  .container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 18px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}
</style>

@if(!$subTotal == '0')
<?php
$artist =  \App\Vendor::where('status','=',0)->get();
$songs  =  \App\AutorSong::where('status','=',0)->get();
                
?>


 @foreach($artist as $row)
 
<div class="page-content">
  
  <div class="row-col">
    <div class="col-lg-9 b-r no-border-md">
      
      <div class="padding">
        
        <div class="page-title m-b">
         <center><h1 class="inline m-a-0 ce">Cart</h1></center> 
      
        </div>
        @foreach($cartCollection as $key =>$row1)
                   <?php

                     $autorsong =  \App\AutorSong::where('id','=',$row1->id)->first();
                     $autordeatils =  \App\Vendor::where('id','=',$autorsong->autor_id)->first();
                    ?>
      
        <div class="row item-list item-list-md item-list-li m-b">
             <!--  <div class="col-xs-12">
              	<div class="item r" data-id="item-12" data-src="http://api.soundcloud.com/tracks/174495152/stream?client_id=a10d44d431ad52868f1bce6d36f5234c"> -->
          			<div class="item-media ">
          				<a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('{{ asset($autorsong->img) }}');"></a>
          				<div class="item-overlay center">
          					<button  class="btn-playpause">Play</button>
          				</div>
          			</div>
          			<div class="item-info">
          				<div class="item-overlay bottom text-right">
          					<a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
          					<a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
          					<div class="dropdown-menu pull-right black lt"></div>
          				</div>
          				
          				
          				<div class="item-title text-ellipsis">
          					<a href="{{ route('track.details',['id' => $row->id]) }}">{{$row1->name}}</a>
          				</div>

          				
          				<div class="item-author text-sm text-ellipsis ">
          					<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">{{$autordeatils->name}}</a>
          				</div>
                   

          				<div class="item-meta text-sm text-muted">
          		          <span class="item-meta-stats text-xs  item-meta-right" style="display: inline-block; margin-top: 30px !important">
          		           <a href="{{ route('cart.delete', ['id' => $row1->id] ) }}" class="btn btn-danger"><i class="fa fa-times fa-lg" ></i></a>
          		          	<!-- <i class="fa fa-heart m-l-sm text-muted"></i> 240 -->
          		          </span>
          		        </div>
          
          
          			</div>
          		</div>
          	
             @endforeach
</div>
</div>
        <!-- </div>

      </div>
    </div>
 -->
    <div class="col-lg-3 w-xxl w-auto-md">
     
    
                     
                 
      <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
      	<h6 class="text text-muted">Order Summery</h6>
      	<div class="row item-list item-list-sm m-b">
           @foreach($cartCollection as $key =>$row1)
                   <?php
                     $autorsong =  \App\AutorSong::where('id','=',$row1->id)->first();
                     $autordeatils =  \App\Vendor::where('id','=',$autorsong->autor_id)->first();
                    ?>
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-1" data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('{{ asset($autorsong->img) }}');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="{{ route('track.details',['id' => $row->id]) }}">{{$row1->name}}</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis " style="margin-top: 5px;">
                     <?php
                               $price =  \App\Price::all();
                
                      ?>
                       @foreach($price as $key =>$row2)
                      
      							<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted"><b>  ${{$row2->price}} </b></a>
      						</div>
                  @endforeach
      		
      		
      					</div>
      				</div>
      			</div>
            @endforeach
      		    <!--  -->
      		    <div class="col-xs-12" style="margin-top: 60px !important">
      		    	<div class="item r" data-id="item-11" data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<!-- <div class="item-media ">
      						<a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('images/b10.jpg');"></a>
      					</div> -->
      					<div class="item-info">
      						<div class="item-title text-ellipsis" >
      							<a href="{{ route('track.details',['id' => $row->id]) }}"><h4>Total</h4></a>
      						</div>
                  
      						<div class="item-author text-sm text-ellipsis " style="margin-top: 10px !important">

                    @if($subTotal%10 ==0)
      							<b>     ${{$subTotal  ?? ' '}}0</b>
                    @else
                        <b>   ${{$subTotal  ?? ' '}}</b>
                    @endif
      						</div>
                  
      					</div>
      				</div>
      			</div>

            <div class="col-xs-12" style="margin-top: 20px !important" >
                <div class="item r" data-id="item-4" data-src="http://api.soundcloud.com/tracks/230791292/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                  @foreach($cartCollection as $key =>$row1)
                 <form action="{{route('stripe' , ['id' => $row1->id ]) }}" method="post" enctype="multipart/form-data" >
                     @csrf
                      @endforeach
<label class="container">PayPal
  <input type="radio" checked="checked" value="paypal" name="paymant">
  <span class="checkmark"></span>
</label>

<label class="container">Debit Card/Credit
  <input type="radio" checked="checked" value="stripe" name="paymant">
  <span class="checkmark"></span>
</label>
                </div></div>

      		    <div class="col-xs-12" style="margin-top: 20px !important" >
      		    	<div class="item r" data-id="item-4" data-src="http://api.soundcloud.com/tracks/230791292/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<!-- <div class="item-media ">
      						<a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('images/b3.jpg');"></a>
      					</div> -->
      					<div class="item-info">
      						<div class="item-title text-ellipsis">

                     
              <button class="btn btn-primary" style="width: 100%" >Check Out</button>
      						

                    
      						</div>
      					<!-- 	<div class="item-author text-sm text-ellipsis ">
      							<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Judith Garcia</a>
      						</div> -->
      		
      		</form>
      					</div>
      				</div>
      			</div>
      	</div>
      	<!-- <h6 class="text text-muted">Go mobile</h6> -->
      	<div class="btn-groups">
             <!--  <a href="" class="btn btn-sm dark lt m-r-xs" style="width: 135px">
                <span class="pull-left m-r-sm">
                  <i class="fa fa-apple fa-2x"></i>
                </span>
                <span class="clear text-left l-h-1x">
                  <span class="text-muted text-xxs">Download on the</span>
                  <b class="block m-b-xs">App Store</b>
                </span>
              </a>
              <a href="" class="btn btn-sm dark lt" style="width: 133px">
                <span class="pull-left m-r-sm">
                  <i class="fa fa-play fa-2x"></i>
                </span>
                <span class="clear text-left l-h-1x">
                  <span class="text-muted text-xxs">Get it on</span>
                  <b class="block m-b-xs m-r-xs">Google Play</b>
                </span>
              </a>
          </div>
          <div class="b-b m-y"></div>
          <div class="nav text-sm _600">
          	<a href="#" class="nav-link text-muted m-r-xs">About</a>
          	<a href="#" class="nav-link text-muted m-r-xs">Contact</a>
          	<a href="#" class="nav-link text-muted m-r-xs">Legal</a>
          	<a href="#" class="nav-link text-muted m-r-xs">Policy</a>
          </div>
          <p class="text-muted text-xs p-b-lg">&copy; Copyright 2016</p>
      </div> -->
    </div>
  </div>
</div>

<!-- ############ PAGE END-->

    <!-- </div> -->
 <!--  </div> -->
  <!-- / -->

  
  <!-- ############ SWITHCHER START-->
    <div id="switcher">
      <div class="switcher white" id="sw-theme">
        <a href="#" data-ui-toggle-class="active" data-ui-target="#sw-theme" class="white sw-btn">
          <i class="fa fa-gear text-muted"></i>
        </a>
        <div class="box-header">
          <strong>Theme Switcher</strong>
        </div>
        <div class="box-divider"></div>
        <div class="box-body">
          <p id="settingLayout" class="hidden-md-down">
            <label class="md-check m-y-xs" data-target="folded">
              <input type="checkbox">
              <i class="green"></i>
              <span>Folded Aside</span>
            </label>
            <label class="m-y-xs pointer" data-ui-fullscreen data-target="fullscreen">
              <span class="fa fa-expand fa-fw m-r-xs"></span>
              <span>Fullscreen Mode</span>
            </label>
          </p>
          <p>Colors:</p>
          <p data-target="color">
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="primary">
              <i class="primary"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="accent">
              <i class="accent"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="warn">
              <i class="warn"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="success">
              <i class="success"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="info">
              <i class="info"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="blue">
              <i class="blue"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="warning">
              <i class="warning"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="danger">
              <i class="danger"></i>
            </label>
          </p>
          <p>Themes:</p>
          <div data-target="bg" class="text-u-c text-center _600 clearfix">
            <label class="p-a col-xs-3 light pointer m-a-0">
              <input type="radio" name="theme" value="" hidden>
              <i class="active-checked fa fa-check"></i>
            </label>
            <label class="p-a col-xs-3 grey pointer m-a-0">
              <input type="radio" name="theme" value="grey" hidden>
              <i class="active-checked fa fa-check"></i>
            </label>
            <label class="p-a col-xs-3 dark pointer m-a-0">
              <input type="radio" name="theme" value="dark" hidden>
              <i class="active-checked fa fa-check"></i>
            </label>
            <label class="p-a col-xs-3 black pointer m-a-0">
              <input type="radio" name="theme" value="black" hidden>
              <i class="active-checked fa fa-check"></i>
            </label>
          </div>
        </div>
      </div>
    </div>
  <!-- ############ SWITHCHER END-->
  <!-- ############ SEARCH START -->
    <div class="modal white lt fade" id="search-modal" data-backdrop="false">
      <a data-dismiss="modal" class="text-muted text-lg p-x modal-close-btn">&times;</a>
      <div class="row-col">
        <div class="p-a-lg h-v row-cell v-m">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <form action="search.html" class="m-b-md">
                <div class="input-group input-group-lg">
                  <input type="text" class="form-control" placeholder="Type keyword" data-ui-toggle-class="hide" data-ui-target="#search-result">
                  <span class="input-group-btn">
                    <button class="btn b-a no-shadow white" type="submit">Search</button>
                  </span>
                </div>
              </form>
              <div id="search-result" class="animated fadeIn">
                <p class="m-b-md"><strong>23</strong> <span class="text-muted">Results found for: </span><strong>Keyword</strong></p>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="row item-list item-list-sm item-list-by m-b">
                          <div class="col-xs-12">
                          	<div class="item r" data-id="item-8" data-src="http://api.soundcloud.com/tracks/236288744/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                      			<div class="item-media ">
                      				<a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('images/b7.jpg');"></a>
                      			</div>
                      			<div class="item-info">
                      				<div class="item-title text-ellipsis">
                      					<a href="{{ route('track.details',['id' => $row->id]) }}">Simple Place To Be</a>
                      				</div>
                      				<div class="item-author text-sm text-ellipsis ">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">RYD</a>
                      				</div>
                      				<div class="item-meta text-sm text-muted">
                      		        </div>
                      
                      
                      			</div>
                      		</div>
                      	</div>
                          <div class="col-xs-12">
                          	<div class="item r" data-id="item-12" data-src="http://api.soundcloud.com/tracks/174495152/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                      			<div class="item-media ">
                      				<a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('images/b11.jpg');"></a>
                      			</div>
                      			<div class="item-info">
                      				<div class="item-title text-ellipsis">
                      					<a href="{{ route('track.details',['id' => $row->id]) }}">Happy ending</a>
                      				</div>
                      				<div class="item-author text-sm text-ellipsis ">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Postiljonen</a>
                      				</div>
                      				<div class="item-meta text-sm text-muted">
                      		        </div>
                      
                      
                      			</div>
                      		</div>
                      	</div>
                          <div class="col-xs-12">
                          	<div class="item r" data-id="item-9" data-src="http://api.soundcloud.com/tracks/264094434/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                      			<div class="item-media ">
                      				<a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('images/b8.jpg');"></a>
                      			</div>
                      			<div class="item-info">
                      				<div class="item-title text-ellipsis">
                      					<a href="{{ route('track.details',['id' => $row->id]) }}">All I Need</a>
                      				</div>
                      				<div class="item-author text-sm text-ellipsis ">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Pablo Nouvelle</a>
                      				</div>
                      				<div class="item-meta text-sm text-muted">
                      		        </div>
                      
                      
                      			</div>
                      		</div>
                      	</div>
                          <div class="col-xs-12">
                          	<div class="item r" data-id="item-4" data-src="http://api.soundcloud.com/tracks/230791292/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                      			<div class="item-media ">
                      				<a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('images/b3.jpg');"></a>
                      			</div>
                      			<div class="item-info">
                      				<div class="item-title text-ellipsis">
                      					<a href="{{ route('track.details',['id' => $row->id]) }}">What A Time To Be Alive</a>
                      				</div>
                      				<div class="item-author text-sm text-ellipsis ">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Judith Garcia</a>
                      				</div>
                      				<div class="item-meta text-sm text-muted">
                      		        </div>
                      
                      
                      			</div>
                      		</div>
                      	</div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row item-list item-list-sm item-list-by m-b">
                          <div class="col-xs-12">
                          	<div class="item">
                      			<div class="item-media rounded ">
                      				<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a6.jpg');"></a>
                      			</div>
                      			<div class="item-info ">
                      				<div class="item-title text-ellipsis">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}">OlsJesse Russell</a>
                      					<div class="text-sm text-muted">23 songs</div>
                      				</div>
                      			</div>
                      		</div>
                      	</div>
                          <div class="col-xs-12">
                          	<div class="item">
                      			<div class="item-media rounded ">
                      				<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a3.jpg');"></a>
                      			</div>
                      			<div class="item-info ">
                      				<div class="item-title text-ellipsis">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}">Joe Holmes</a>
                      					<div class="text-sm text-muted">24 songs</div>
                      				</div>
                      			</div>
                      		</div>
                      	</div>
                          <div class="col-xs-12">
                          	<div class="item">
                      			<div class="item-media rounded ">
                      				<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a1.jpg');"></a>
                      			</div>
                      			<div class="item-info ">
                      				<div class="item-title text-ellipsis">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}">James Garcia</a>
                      					<div class="text-sm text-muted">9 songs</div>
                      				</div>
                      			</div>
                      		</div>
                      	</div>
                          <div class="col-xs-12">
                          	<div class="item">
                      			<div class="item-media rounded ">
                      				<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a0.jpg');"></a>
                      			</div>
                      			<div class="item-info ">
                      				<div class="item-title text-ellipsis">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}">Crystal Guerrero</a>
                      					<div class="text-sm text-muted">12 songs</div>
                      				</div>
                      			</div>
                      		</div>
                      	</div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="top-search" class="btn-groups">
                <strong class="text-muted">Top searches: </strong>
                <a href="#" class="btn btn-xs white">Happy</a> 
                <a href="#" class="btn btn-xs white">Music</a> 
                <a href="#" class="btn btn-xs white">Weekend</a> 
                <a href="#" class="btn btn-xs white">Summer</a> 
                <a href="#" class="btn btn-xs white">Holiday</a> 
                <a href="#" class="btn btn-xs white">Blue</a> 
                <a href="#" class="btn btn-xs white">Soul</a> 
                <a href="#" class="btn btn-xs white">Calm</a> 
                <a href="#" class="btn btn-xs white">Nice</a> 
                <a href="#" class="btn btn-xs white">Home</a> 
                <a href="#" class="btn btn-xs white">SLeep</a> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ############ SEARCH END -->
  <!-- ############ SHARE START -->
  <div id="share-modal" class="modal fade animate">
    <div class="modal-dialog">
      <div class="modal-content fade-down">
        <div class="modal-header">
  
          <h5 class="modal-title">Share</h5>
        </div>
        <div class="modal-body p-lg">
          <div id="share-list" class="m-b">
            <a href="" class="btn btn-icon btn-social rounded btn-social-colored indigo" title="Facebook">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-facebook"></i>
            </a>
  
            <a href="" class="btn btn-icon btn-social rounded btn-social-colored light-blue" title="Twitter">
                <i class="fa fa-twitter"></i>
                <i class="fa fa-twitter"></i>
            </a>
  
            <a href="" class="btn btn-icon btn-social rounded btn-social-colored red-600" title="Google+">
                <i class="fa fa-google-plus"></i>
                <i class="fa fa-google-plus"></i>
            </a>
  
            <a href="" class="btn btn-icon btn-social rounded btn-social-colored blue-grey-600" title="Trumblr">
                <i class="fa fa-tumblr"></i>
                <i class="fa fa-tumblr"></i>
            </a>
  
            <a href="" class="btn btn-icon btn-social rounded btn-social-colored red-700" title="Pinterst">
                <i class="fa fa-pinterest"></i>
                <i class="fa fa-pinterest"></i>
            </a>
          </div>
          <div>
            <input class="form-control" value="http://plamusic.com/slug"/>
          </div>
        </div>
      </div>
    </div>
  </div>
   @endforeach
  <!-- ############ SHARE END -->

<!-- ############ LAYOUT END-->
  </div>

  @else
<div class="row" style="margin-top: 270px; background-color: #F2F3F4; ">
            <div class="col-md-12">
                <div class="no data-wrap py-5 my-5 text-center">
                    <h1 class="display-1"><i class="la la-frown-o"></i> </h1>
                    <h1>No Song in  Cart </h1>
                </div>
            </div>
        </div>
  </div>

  @endif
 @jquery
@toastr_js
@toastr_render
  @endsection

<!-- build:js scripts/app.min.js -->
<!-- jQuery