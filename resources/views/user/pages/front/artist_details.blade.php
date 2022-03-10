
@extends('user.layouts.include')

@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #FFC300;
  color: #333;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
 /* bottom: 30px;*/
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 0px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 00px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</style>

@toastr_css
<!-- ############ PAGE START-->
<?php
$artist =  \App\Vendor::where('status','=',0)->get();;
                
?>

@auth
 @foreach($artist as $row)

<div class="pos-rlt">


  <div class="page-bg" data-stellar-ratio="2" style="background-image: url('images/b5.jpg');"></div>
</div>
<div class="page-content">
  <div class="padding b-b">
    <div class="row-col">
        <div class="col-sm w w-auto-xs m-b">
          <div class="item w rounded">
            <div class="item-media">
              <div class="item-media-content" style="background-image: url('{{ asset($vendor->image) }}');"></div>
            </div>
          </div>
        </div>
        <div class="col-sm">
          <div class="p-l-md no-padding-xs">
            <div class="page-title">
 
                              

                                 
              <h1 class="inline">{{$vendor->name ?? 'No Name'}}</h1>

             
              <a class="btnnn" id="btnnn"> 
                          
                        @auth     
                         <?php
                             $folow =  \App\Followers::where('user_id','=',Auth::user()->id)->where('autor_id','=',$vendor->id)->first();
                             
                                  $follows =  \App\Followers::where('like','=',1)->where('autor_id','=',$vendor->id)->get();

                                 
                                  
                                  ?>
                @if($folow!=null)
                @if($folow->like == 1)

              <label class="fa fa-star text-primary text-lg m-b v-m m-l-xs"  id="{{$vendor->id}}" onclick="myCarttt(this)" title="Pro"></label> <a style="font-size: 20px;">{{$follows->count()}}<a>
                  @else
              <label class="fa fa-star text-secondory text-lg m-b v-m m-l-xs"  id="{{$vendor->id}}" onclick="myCarttt(this)" title="Pro"></label> <a style="font-size: 20px;">{{$follows->count()}}<a>
                @endif
                @else 
                 <label class="fa fa-star text-secondory text-lg m-b v-m m-l-xs"  id="{{$vendor->id}}" onclick="myCarttt(this)" title="Pro"></label> <a style="font-size: 20px;">{{$follows->count()}}<a>
                @endif
                   
                @else
                <label class="fa fa-star text-primary text-lg m-b v-m m-l-xs"  id="{{$vendor->id}}" onclick="myCarttt(this)" title="Pro"></label> <a style="font-size: 20px;">

                  @endauth
            </a>
            
            </div>
            <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis">{{$vendor->description ?? ''}}</p>
            <div class="item-action m-b">
              <a class="btn btn-icon white rounded btn-share pull-right" data-toggle="modal" data-target="#share-modal"><i class="fa fa-share-alt"></i></a>
              <button class="btn-playpause text-primary m-r-sm"></button> 
              <span>{{count($album)}} Albums, {{count($songs)}}  Tracks</span>
            </div>
            <div class="block clearfix m-b">
              <!-- <a class="btn btn-xs rounded white">Soul</a> <a class="btn btn-xs rounded white">Electro</a> -->
            </div>
          </div>
        </div>
    </div>
  </div>

  <div class="row-col">
    <div class="col-lg-9 b-r no-border-md">
      <div class="padding">
        <div class="nav-active-border b-primary bottom m-b-md">
          <ul class="nav l-h-2x">
            <li class="nav-item m-r inline">
              <a class="nav-link active" href="#" data-toggle="tab" data-target="#tab_1">Overview</a>
            </li>
            <li class="nav-item m-r inline">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_2">Tracks</a>
            </li>
            <li class="nav-item m-r inline">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_3">Playlists</a>
            </li>
            <!-- <li class="nav-item m-r inline">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_4">Profile</a>
            </li> -->
          </ul>
        </div>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <h5 class="m-b">Popular</h5>
            <div id="snackbar">Song Add in Cart..</div>
            <div class="row item-list item-list-md item-list-li m-b" id="tracks">
              @foreach($songs as $key =>$row1)
               
              @if($key++ < 4 )
                  <div class="col-md-12 col-lg-6">
                      
                  	<div class="item r" data-id="item-2" data-src="{{$row1->song}}">
                      <!--  <audio controls>
                 <source src="{{ asset($row1->song)  }}" type="audio/mpeg"> 
                 </audio> -->
              
                     
              			<div class="item-media ">
              				<a href="{{ route('artist.details',['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('{{ asset($row1->img) }}');" ></a>
              				<div class="item-overlay center" >
              					<button  class="btn-playpause  playsong" id="playsong"  onclick="myFunction()"     value="{{url($row1->song)}}">Play</button>
                        <input type="hidden" name="title" id ="title" value="{{$row1->title}}">

              				</div>
              			</div>
              			<div class="item-info">
                     
                           

                          
              				<div class="item-overlay bottom text-right">
                        
              					
              					<!-- <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a> -->
              					<div class="dropdown-menu pull-right black lt"></div>
              				</div>
              				<div class="item-title text-ellipsis">
              					<a href="{{ route('artist.details', ['id' => $row->id] ) }}">{{$row1->title}}</a>
              				</div>
              				<div class="item-author text-sm text-ellipsis hide">
              					<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Kygo</a>
              				</div>
              				<div class="item-meta text-sm text-muted">
              		          <span class="item-meta-stats text-md" style="display: inline-block; margin-top: 10px !important">
                              <?php
                               $price =  \App\Price::first();

               
                                ?>
                                @if($song_id!=null) 
                                @if($song_id->contains($row1->id)==false) 
              		          	<a href="#" ><button id="{{$row1->id}}"  onclick="myCart(this)" class="btn btn-primary chek">
                                <i class="fa fa-shopping-cart fa-md"></i></button></a> ${{$price->price}}
                                @else
                                <a href="#" ><button  class="btn btn-success chek">
                                <i class="fa fa-lock fa-md"></i></button></a>
                                @endif
                                @else
                                  <a href="#" ><button id="{{$row1->id}}"  onclick="myCart(this)" class="btn btn-primary chek">
                                <i class="fa fa-shopping-cart fa-md"></i></button></a>
                                @endif
              		          <a class="btnn" id="btnn">
                              @auth
                              <?php
                             $likes =  \App\Like::where('user_id','=',Auth::user()->id)->where('song_id','=',$row1->id)->first();
                             
                                  $likess =  \App\Like::where('like','=',1)->where('song_id','=',$row1->id)->get();
                                  
                                  ?>
                                @if($likes!=null)
                                  @if($likes->like == 0)
                              <i class="fa fa-heart "   aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">{{$likess->count()}}</i></a>
                              @else
                               <i class="fa fa-heart " style="color: red"  aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">{{$likess->count()}}</i></a>
                            
                               @endif
                               @else
                                <i class="fa fa-heart "   aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">{{$likess->count()}}</i></a>
                                @endif

                                @else
                                <i class="fa fa-heart "   aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">0</i></a>
                                @endauth
                              
              		          </span>


              		        </div>
                         

                         
      
              
              
              			</div>

              		</div>
                  
              	</div>
                @endif
                 @endforeach
                 
            </div>
            <h5 class="m-b">Albums</h5>
            <div class="row m-b">
               @foreach($album as $key =>$row1)
               
             
                  <div class="col-xs-4 col-sm-4 col-md-3">
                  	<div class="item r" data-id="item-7" data-src="http://api.soundcloud.com/tracks/245566366/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
              			<div class="item-media ">
              				<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('{{ asset($row1->image) }}');"></a>
              				<div class="item-overlay center">
              					<button  class="btn-playpause">Play</button>
              				</div>
              			</div>
              			<div class="item-info">
              				<div class="item-overlay bottom text-right">
              					<a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
              					<!-- <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a> -->
              					<div class="dropdown-menu pull-right black lt"></div>
              				</div>
              				<div class="item-title text-ellipsis">
              					<a href="{{ route('artist.details', ['id' => $row->id] ) }}">{{$row1->title}}</a>
              				</div>
              				<div class="item-author text-sm text-ellipsis hide">
              					<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Fifth Harmony</a>
              				</div>
              				<div class="item-meta text-sm text-muted">
              		          <span class="item-meta-stats text-xs ">
              		          	<!-- <i class="fa fa-play text-muted"></i> 200 
              		          	<i class="fa fa-heart m-l-sm text-muted"></i> 510 -->
              		          </span>
              		        </div>
              
              
              			</div>
              		</div>
              	</div>

                 @endforeach
                 
                  
              
                 
                 
            </div>
            <a href="#" class="btn btn-sm white rounded">Show More</a>
          </div>
          <div class="tab-pane" id="tab_2">
            <div class="row m-b">
               @foreach($songs as $key =>$row1)
                  <div class="col-xs-4 col-sm-4 col-md-3">
                  	<div class="item r" data-id="item-2" data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
              			<div class="item-media ">
              				<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('{{ asset($row1->img) }}');"></a>
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
              					<a href="{{ route('artist.details', ['id' => $row->id] ) }}" style="font-size: 15px;">{{$row1->title}}</a>
              				</div>
              				<div class="item-author text-sm text-ellipsis hide">
              					<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Kygo</a>
              				</div>
              				<div class="item-meta text-sm text-muted">

              		          <span class="item-meta-stats text-xs ">
                               <?php
                             $likes =  \App\Like::where('user_id','=',Auth::user()->id)->where('song_id','=',$row1->id)->first();
                             
                                  $likess =  \App\Like::where('like','=',1)->where('song_id','=',$row1->id)->get();
                                   //Playsong
                                  $playSong =  \App\Playsong::where('user_id','=',Auth::user()->id)->where('song_id','=',$row1->id)->first();
                                  $playSongs = \App\Playsong::where('like','=',1)->where('song_id','=',$row1->id)->get();
                                  
                                  ?>
              		          @if($playSong!=null)
                              <i class="fa fa-play  " style="color: blue; font-size: 15px;"> {{$playSongs->count()}} </i> 
                              @else
                               <i class="fa fa-play  text-muted" style="font-size: 15px;" > {{$playSongs->count()}}  </i>

                              @endif
                               <a class="btnn" id="btnn"> 
                              @auth

                                @if($likes!=null)
                                  @if($likes->like == 0)
              		          	<i class="fa fa-heart " style="font-size: 15px;"  aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">{{$likess->count()}}</i></a>
                              @else
                               <i class="fa fa-heart " style="color: red; font-size: 15px;"  aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">{{$likess->count()}}</i></a>
                            
                               @endif
                               @else
                                <i class="fa fa-heart "  style="font-size: 15px;"  aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">{{$likess->count()}}</i></a>
                                @endif

                                @else
                                <i class="fa fa-heart "  style="font-size: 15px;"  aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">7</i></a>
                                @endauth
              		          </span>
              		        </div>
              
              
              			</div>
              		</div>
              	</div>
                
                  @endforeach
                 
              
            </div>
            <!-- <a href="#" class="btn btn-sm white rounded">Show More</a> -->
          </div>
          <div class="tab-pane" id="tab_3">
            <div class="row m-b">
                  <div class="col-xs-4 col-sm-4 col-md-3">
                  	<div class="item r" data-id="item-9" data-src="http://api.soundcloud.com/tracks/264094434/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
              			<div class="item-media ">
              				<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b8.jpg');"></a>
              				<div class="item-overlay center">
              					<button  class="btn-playpause">Play</button>
              				</div>
              			</div>
              			<div class="item-info">
              				<div class="item-overlay bottom text-right">
              					<a href="#" class="btn-favorite"><i class="fa fa-heart-o "></i></a>
              					<a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
              					<div class="dropdown-menu pull-right black lt"></div>
              				</div>
              				<div class="item-title text-ellipsis">
              					<a href="{{ route('artist.details', ['id' => $row->id] ) }}" style="font-size: 15px;">All I Need</a>
              				</div>
              				<div class="item-author text-sm text-ellipsis hide">
              					<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Pablo Nouvelle</a>
              				</div>
              				<div class="item-meta text-sm text-muted">
              		          <span class="item-meta-stats text-xs ">
              		          	 <?php
                             $likes =  \App\Like::where('user_id','=',Auth::user()->id)->where('song_id','=',$row1->id)->first();
                             
                                  $likess =  \App\Like::where('like','=',1)->where('song_id','=',$row1->id)->get();
                                   //Playsong
                                  $playSong =  \App\Playsong::where('user_id','=',Auth::user()->id)->where('song_id','=',$row1->id)->first();
                                  $playSongs = \App\Playsong::where('like','=',1)->where('song_id','=',$row1->id)->get();
                                  
                                  ?>
                            @if($playSong!=null)
                              <i class="fa fa-play  " style="color: blue; font-size: 15px;"> {{$playSongs->count()}} </i> 
                              @else
                               <i class="fa fa-play  text-muted" style="font-size: 15px;" > {{$playSongs->count()}}  </i>

                              @endif
                               <a class="btnn" id="btnn"> 
              		          	 @auth

                                @if($likes!=null)
                                  @if($likes->like == 0)
                              <i class="fa fa-heart " style="font-size: 15px;"  aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">{{$likess->count()}}</i></a>
                              @else
                               <i class="fa fa-heart " style="color: red; font-size: 15px;"  aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">{{$likess->count()}}</i></a>
                            
                               @endif
                               @else
                                <i class="fa fa-heart "  style="font-size: 15px;"  aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">{{$likess->count()}}</i></a>
                                @endif

                                @else
                                <i class="fa fa-heart "  style="font-size: 15px;"  aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">7</i></a>
                                @endauth
              		          </span>
              		        </div>
              
              
              			</div>
              		</div>
              	</div>
                 
          </div>
          <!-- <div class="tab-pane" id="tab_4">
            <div class="row-col m-b">
              <div class="col-xs w-xs text-muted">Location</div>
              <?php
               $countory =  \App\Countory::where('id','=',$vendor->countory_id)->first();
               $city =  \App\City::where('id','=',$vendor->city_id)->first();
                
                     ?>
              <div class="col-xs">{{$city->name}}   {{$countory->name}} </div>
            </div>
            <div class="row-col m-b">
              <div class="col-xs w-xs text-muted">Education</div>
              <div class="col-xs"><a href="http://rachel-platten.com">{{$vendor->education ?? ' '}}</a></div>
            </div>
            <div class="row-col m-b">
              <div class="col-xs w-xs text-muted">Contact # </div>
              <div class="col-xs"><a href="http://rachel-platten.com">{{$vendor->number ?? ' '}}</a></div>
            </div>
            <div class="row-col m-b">
              <div class="col-xs w-xs text-muted"></div>
              <div class="col-xs">
                  <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-facebook indigo"></i>
                  </a>
                  <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-twitter light-blue"></i>
                  </a>
                  <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                    <i class="fa fa-google-plus"></i>
                    <i class="fa fa-google-plus red"></i>
                  </a>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
    <!-- <div class="col-lg-3 w-xxl w-auto-md"> -->
     <!--  <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
      	<h6 class="text text-muted">5 Likes</h6>
      	<div class="row item-list item-list-sm m-b">
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-3" data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b2.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="{{ route('artist.details', ['id' => $row->id] ) }}">I Wanna Be In the Cavalry</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Jeremy Scott</a>
      						</div>
      		
      		
      					</div>
      				</div>
      			</div>
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-10" data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b9.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="{{ route('artist.details', ['id' => $row->id] ) }}">The Open Road</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Postiljonen</a>
      						</div>
      		
      		
      					</div>
      				</div>
      			</div>
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-1" data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b0.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="{{ route('artist.details', ['id' => $row->id] ) }}">Pull Up</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Summerella</a>
      						</div>
      		
      		
      					</div>
      				</div>
      			</div>
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-11" data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b10.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="{{ route('artist.details', ['id' => $row->id] ) }}">Spring</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Pablo Nouvelle</a>
      						</div>
      		
      		
      					</div>
      				</div>
      			</div>
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-7" data-src="http://api.soundcloud.com/tracks/245566366/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b6.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="{{ route('artist.details', ['id' => $row->id] ) }}">Reflection (Deluxe)</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Fifth Harmony</a>
      						</div>
      		
      		
      					</div>
      				</div>
      			</div>
      	</div>
      	<h6 class="text text-muted">Go mobile</h6>
      	<div class="btn-groups">
              <a href="" class="btn btn-sm dark lt m-r-xs" style="width: 135px">
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
      </div>
    </div>
  </div>
</div> -->

<!-- ############ PAGE END-->

    </div>
  </div>
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
                          	<div class="item r" data-id="item-12" data-src="http://api.soundcloud.com/tracks/174495152/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                      			<div class="item-media ">
                      				<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b11.jpg');"></a>
                      			</div>
                      			<div class="item-info">
                      				<div class="item-title text-ellipsis">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}">Happy ending</a>
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
                      				<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b8.jpg');"></a>
                      			</div>
                      			<div class="item-info">
                      				<div class="item-title text-ellipsis">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}">All I Need</a>
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
                          	<div class="item r" data-id="item-5" data-src="http://streaming.radionomy.com/JamendoLounge">
                      			<div class="item-media ">
                      				<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b4.jpg');"></a>
                      			</div>
                      			<div class="item-info">
                      				<div class="item-title text-ellipsis">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}">Live Radio</a>
                      				</div>
                      				<div class="item-author text-sm text-ellipsis ">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Radionomy</a>
                      				</div>
                      				<div class="item-meta text-sm text-muted">
                      		        </div>
                      
                      
                      			</div>
                      		</div>
                      	</div>
                          <div class="col-xs-12">
                          	<div class="item r" data-id="item-10" data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                      			<div class="item-media ">
                      				<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b9.jpg');"></a>
                      			</div>
                      			<div class="item-info">
                      				<div class="item-title text-ellipsis">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}">The Open Road</a>
                      				</div>
                      				<div class="item-author text-sm text-ellipsis ">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Postiljonen</a>
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
                      				<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a4.jpg');"></a>
                      			</div>
                      			<div class="item-info ">
                      				<div class="item-title text-ellipsis">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}">Judith Garcia</a>
                      					<div class="text-sm text-muted">13 songs</div>
                      				</div>
                      			</div>
                      		</div>
                      	</div>
                          <div class="col-xs-12">
                          	<div class="item">
                      			<div class="item-media rounded ">
                      				<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a9.jpg');"></a>
                      			</div>
                      			<div class="item-info ">
                      				<div class="item-title text-ellipsis">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}">Douglas Torres</a>
                      					<div class="text-sm text-muted">20 songs</div>
                      				</div>
                      			</div>
                      		</div>
                      	</div>
                          <div class="col-xs-12">
                          	<div class="item">
                      			<div class="item-media rounded ">
                      				<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a2.jpg');"></a>
                      			</div>
                      			<div class="item-info ">
                      				<div class="item-title text-ellipsis">
                      					<a href="{{ route('artist.details', ['id' => $row->id] ) }}">Jean Schneider</a>
                      					<div class="text-sm text-muted">8 songs</div>
                      				</div>
                      			</div>
                      		</div>
                      	</div>
                          @endforeach
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
  <!-- ############ SHARE END -->
  @else
   @foreach($artist as $row)
  <div style="margin-left: 200px;">
<div class="pos-rlt">


  <div class="page-bg" data-stellar-ratio="2" style="background-image: url('images/b5.jpg');"></div>
</div>
<div class="page-content">
  <div class="padding b-b">
    <div class="row-col">
        <div class="col-sm w w-auto-xs m-b">
          <div class="item w rounded">
            <div class="item-media">
              <div class="item-media-content" style="background-image: url('{{ asset($vendor->image) }}');"></div>
            </div>
          </div>
        </div>
        <div class="col-sm">
          <div class="p-l-md no-padding-xs">
            <div class="page-title">
 
                              

                                 
              <h1 class="inline">{{$vendor->name ?? 'No Name'}}</h1>

             
              <a class="btnnn" id="btnnn"> 
                          
                        @auth     
                         <?php
                             $folow =  \App\Followers::where('user_id','=',Auth::user()->id)->where('autor_id','=',$vendor->id)->first();
                             
                                  $follows =  \App\Followers::where('like','=',1)->where('autor_id','=',$vendor->id)->get();

                                 
                                  
                                  ?>
                @if($folow!=null)
                @if($folow->like == 1)

              <label class="fa fa-star text-primary text-lg m-b v-m m-l-xs"  id="{{$vendor->id}}" onclick="myCarttt(this)" title="Pro"></label> <a style="font-size: 20px;">{{$follows->count()}}<a>
                  @else
              <label class="fa fa-star text-secondory text-lg m-b v-m m-l-xs"  id="{{$vendor->id}}" onclick="myCarttt(this)" title="Pro"></label> <a style="font-size: 20px;">{{$follows->count()}}<a>
                @endif
                @else 
                 <label class="fa fa-star text-secondory text-lg m-b v-m m-l-xs"  id="{{$vendor->id}}" onclick="myCarttt(this)" title="Pro"></label> <a style="font-size: 20px;">{{$follows->count()}}<a>
                @endif
                   
                @else
                <a href="{{ route('login' ) }}"> <label class="fa fa-star text-primary text-lg m-b v-m m-l-xs"  id="{{$vendor->id}}" onclick="myCarttt(this)" title="Pro"></label> <a style="font-size: 20px;"></a>

                  @endauth
            </a>
            
            </div>
            <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis">{{$vendor->description ?? ''}}</p>
            <div class="item-action m-b">
              <a class="btn btn-icon white rounded btn-share pull-right" data-toggle="modal" data-target="#share-modal"><i class="fa fa-share-alt"></i></a>
              <button class="btn-playpause text-primary m-r-sm"></button> 
              <span>{{count($album)}} Albums, {{count($songs)}}  Tracks</span>
            </div>
            <div class="block clearfix m-b">
              <!-- <a class="btn btn-xs rounded white">Soul</a> <a class="btn btn-xs rounded white">Electro</a> -->
            </div>
          </div>
        </div>
    </div>
  </div>

  <div class="row-col">
    <div class="col-lg-9 b-r no-border-md">
      <div class="padding">
        <div class="nav-active-border b-primary bottom m-b-md">
          <ul class="nav l-h-2x">
            <li class="nav-item m-r inline">
              <a class="nav-link active" href="#" data-toggle="tab" data-target="#tab_1">Overview</a>
            </li>
            <li class="nav-item m-r inline">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_2">Tracks</a>
            </li>
            <li class="nav-item m-r inline">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_3">Playlists</a>
            </li>
            <!-- <li class="nav-item m-r inline">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_4">Profile</a>
            </li> -->
          </ul>
        </div>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <h5 class="m-b">Popular</h5>
            <div id="snackbar">Song Add in Cart..</div>
            <div class="row item-list item-list-md item-list-li m-b" id="tracks">
              @foreach($songs as $key =>$row1)
               
              @if($key++ < 4 )
                  <div class="col-md-12 col-lg-6">
                      
                    <div class="item r" data-id="item-2" data-src="{{$row1->song}}">
                      <!--  <audio controls>
                 <source src="{{ asset($row1->song)  }}" type="audio/mpeg"> 
                 </audio> -->
              
                     
                    <div class="item-media ">
                      <a href="{{ route('artist.details',['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('{{ asset($row1->img) }}');" ></a>
                      <div class="item-overlay center" >
                        <button  class="btn-playpause  playsong" id="playsong"  onclick="myFunction()"     value="{{url($row1->song)}}">Play</button>
                        <input type="hidden" name="title" id ="title" value="{{$row1->title}}">

                      </div>
                    </div>
                    <div class="item-info">
                     
                           

                          
                      <div class="item-overlay bottom text-right">
                        
                        
                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu pull-right black lt"></div>
                      </div>
                      <div class="item-title text-ellipsis">
                        <a href="{{ route('artist.details', ['id' => $row->id] ) }}">{{$row1->title}}</a>
                      </div>
                      <div class="item-author text-sm text-ellipsis hide">
                        <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Kygo</a>
                      </div>
                      <div class="item-meta text-sm text-muted">
                            <span class="item-meta-stats text-md" style="display: inline-block; margin-top: 10px !important">
                              <?php
                               $price =  \App\Price::pluck('price');

                
                                  ?>
                                  
                                  @auth
                                  
                                  
                                   
                              <a href="#" ><button id="{{$row1->id}}"  onclick="myCart(this)" class="btn btn-primary chek">
                                <i class="fa fa-shopping-cart fa-md"></i></button></a> ${{$price}}
                               


                               
                                  
                                  @else
                               
                                      
                              <a href="{{ route('login' ) }}" ><button  class="btn btn-primary chek">
                               
                                <i class="fa fa-shopping-cart fa-md"></i></button></a> ${{$price[0]}}
                                 
                                  @endauth
                            <a class="btnn" id="btnn">
                              @auth
                              <?php
                             $likes =  \App\Like::where('user_id','=',Auth::user()->id)->where('song_id','=',$row1->id)->first();
                             
                                  $likess =  \App\Like::where('like','=',1)->where('song_id','=',$row1->id)->get();
                                  
                                  ?>
                                @if($likes!=null)
                                  @if($likes->like == 0)
                              <i class="fa fa-heart "   aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">{{$likess->count()}}</i></a>
                              @else
                               <i class="fa fa-heart " style="color: red"  aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">{{$likess->count()}}</i></a>
                            
                               @endif
                               @else
                                <i class="fa fa-heart "   aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">{{$likess->count()}}</i></a>
                                @endif

                                @else
                                <a href="{{ route('login' ) }}"><i class="fa fa-heart "   aria-hidden="true" id="{{$row1->id}}" onclick="myCartt(this)">7</i></a></a>
                                @endauth
                              
                            </span>


                          </div>
                         

                         
      
              
              
                    </div>

                  </div>
                  
                </div>
                @endif
                 @endforeach
                 
            </div>
            <h5 class="m-b">Albums</h5>
            <div class="row m-b">
               @foreach($album as $key =>$row1)
               
             
                  <div class="col-xs-4 col-sm-4 col-md-3">
                    <div class="item r" data-id="item-7" data-src="http://api.soundcloud.com/tracks/245566366/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                    <div class="item-media ">
                      <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('{{ asset($row1->image) }}');"></a>
                      <div class="item-overlay center">
                        <button  class="btn-playpause">Play</button>
                      </div>
                    </div>
                    <div class="item-info">
                      <div class="item-overlay bottom text-right">
                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                        <!-- <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a> -->
                        <div class="dropdown-menu pull-right black lt"></div>
                      </div>
                      <div class="item-title text-ellipsis">
                        <a href="{{ route('artist.details', ['id' => $row->id] ) }}">{{$row1->title}}</a>
                      </div>
                      <div class="item-author text-sm text-ellipsis hide">
                        <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Fifth Harmony</a>
                      </div>
                      <div class="item-meta text-sm text-muted">
                            <span class="item-meta-stats text-xs ">
                              <!-- <i class="fa fa-play text-muted"></i> 200 
                              <i class="fa fa-heart m-l-sm text-muted"></i> 510 -->
                            </span>
                          </div>
              
              
                    </div>
                  </div>
                </div>

                 @endforeach
                 
                  
              
                 
                 
            </div>
            <a href="#" class="btn btn-sm white rounded">Show More</a>
          </div>
          <div class="tab-pane" id="tab_2">
            <div class="row m-b">
               @foreach($songs as $key =>$row1)
                  <div class="col-xs-4 col-sm-4 col-md-3">
                    <div class="item r" data-id="item-2" data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                    <div class="item-media ">
                      <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('{{ asset($row1->img) }}');"></a>
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
                        <a href="{{ route('artist.details', ['id' => $row->id] ) }}" style="font-size: 15px;">{{$row1->title}}</a>
                      </div>
                      <div class="item-author text-sm text-ellipsis hide">
                        <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Kygo</a>
                      </div>
                      <div class="item-meta text-sm text-muted">
                            <span class="item-meta-stats text-xs ">
                              <i class="fa fa-play text-muted" style="font-size: 15px;"></i> 30 
                              <i class="fa fa-heart m-l-sm text-muted" style="font-size: 15px;"></i> 10
                            </span>
                          </div>
              
              
                    </div>
                  </div>
                </div>
                  @endforeach
                 
              
            </div>
            <!-- <a href="#" class="btn btn-sm white rounded">Show More</a> -->
          </div>
          <div class="tab-pane" id="tab_3">
            <div class="row m-b">
              
                  <div class="col-xs-4 col-sm-4 col-md-3">
                    <div class="item r" data-id="item-9" data-src="http://api.soundcloud.com/tracks/264094434/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                    <div class="item-media ">
                      <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b8.jpg');"></a>
                      <div class="item-overlay center">
                        <button  class="btn-playpause">Play</button>
                      </div>
                    </div>
                    <div class="item-info">
                      <div class="item-overlay bottom text-right">
                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o "></i></a>
                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu pull-right black lt"></div>
                      </div>
                      <div class="item-title text-ellipsis">
                        <a href="{{ route('artist.details', ['id' => $row->id] ) }}">All I Need</a>
                      </div>
                      <div class="item-author text-sm text-ellipsis hide">
                        <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Pablo Nouvelle</a>
                      </div>
                      <div class="item-meta text-sm text-muted">
                            <span class="item-meta-stats text-xs ">
                              <i class="fa fa-play text-muted"></i> 4500 
                              <i class="fa fa-heart m-l-sm text-muted"></i> 2310
                            </span>
                          </div>
              
              
                    </div>
                  </div>
                </div>
                 
          </div>
          <!-- <div class="tab-pane" id="tab_4">
            <div class="row-col m-b">
              <div class="col-xs w-xs text-muted">Location</div>
              <?php
               $countory =  \App\Countory::where('id','=',$vendor->countory_id)->first();
               $city =  \App\City::where('id','=',$vendor->city_id)->first();
                
                     ?>
              <div class="col-xs">{{$city->name}}   {{$countory->name}} </div>
            </div>
            <div class="row-col m-b">
              <div class="col-xs w-xs text-muted">Education</div>
              <div class="col-xs"><a href="http://rachel-platten.com">{{$vendor->education ?? ' '}}</a></div>
            </div>
            <div class="row-col m-b">
              <div class="col-xs w-xs text-muted">Contact # </div>
              <div class="col-xs"><a href="http://rachel-platten.com">{{$vendor->number ?? ' '}}</a></div>
            </div>
            <div class="row-col m-b">
              <div class="col-xs w-xs text-muted"></div>
              <div class="col-xs">
                  <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-facebook indigo"></i>
                  </a>
                  <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-twitter light-blue"></i>
                  </a>
                  <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                    <i class="fa fa-google-plus"></i>
                    <i class="fa fa-google-plus red"></i>
                  </a>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
    <!-- <div class="col-lg-3 w-xxl w-auto-md"> -->
     <!--  <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
        <h6 class="text text-muted">5 Likes</h6>
        <div class="row item-list item-list-sm m-b">
              <div class="col-xs-12">
                <div class="item r" data-id="item-3" data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                <div class="item-media ">
                  <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b2.jpg');"></a>
                </div>
                <div class="item-info">
                  <div class="item-title text-ellipsis">
                    <a href="{{ route('artist.details', ['id' => $row->id] ) }}">I Wanna Be In the Cavalry</a>
                  </div>
                  <div class="item-author text-sm text-ellipsis ">
                    <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Jeremy Scott</a>
                  </div>
          
          
                </div>
              </div>
            </div>
              <div class="col-xs-12">
                <div class="item r" data-id="item-10" data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                <div class="item-media ">
                  <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b9.jpg');"></a>
                </div>
                <div class="item-info">
                  <div class="item-title text-ellipsis">
                    <a href="{{ route('artist.details', ['id' => $row->id] ) }}">The Open Road</a>
                  </div>
                  <div class="item-author text-sm text-ellipsis ">
                    <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Postiljonen</a>
                  </div>
          
          
                </div>
              </div>
            </div>
              <div class="col-xs-12">
                <div class="item r" data-id="item-1" data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                <div class="item-media ">
                  <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b0.jpg');"></a>
                </div>
                <div class="item-info">
                  <div class="item-title text-ellipsis">
                    <a href="{{ route('artist.details', ['id' => $row->id] ) }}">Pull Up</a>
                  </div>
                  <div class="item-author text-sm text-ellipsis ">
                    <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Summerella</a>
                  </div>
          
          
                </div>
              </div>
            </div>
              <div class="col-xs-12">
                <div class="item r" data-id="item-11" data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                <div class="item-media ">
                  <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b10.jpg');"></a>
                </div>
                <div class="item-info">
                  <div class="item-title text-ellipsis">
                    <a href="{{ route('artist.details', ['id' => $row->id] ) }}">Spring</a>
                  </div>
                  <div class="item-author text-sm text-ellipsis ">
                    <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Pablo Nouvelle</a>
                  </div>
          
          
                </div>
              </div>
            </div>
              <div class="col-xs-12">
                <div class="item r" data-id="item-7" data-src="http://api.soundcloud.com/tracks/245566366/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                <div class="item-media ">
                  <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b6.jpg');"></a>
                </div>
                <div class="item-info">
                  <div class="item-title text-ellipsis">
                    <a href="{{ route('artist.details', ['id' => $row->id] ) }}">Reflection (Deluxe)</a>
                  </div>
                  <div class="item-author text-sm text-ellipsis ">
                    <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Fifth Harmony</a>
                  </div>
          
          
                </div>
              </div>
            </div>
        </div>
        <h6 class="text text-muted">Go mobile</h6>
        <div class="btn-groups">
              <a href="" class="btn btn-sm dark lt m-r-xs" style="width: 135px">
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
      </div>
    </div>
  </div>
</div> -->

<!-- ############ PAGE END-->

    </div>
  </div>
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
                            <div class="item r" data-id="item-12" data-src="http://api.soundcloud.com/tracks/174495152/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                            <div class="item-media ">
                              <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b11.jpg');"></a>
                            </div>
                            <div class="item-info">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}">Happy ending</a>
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
                              <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b8.jpg');"></a>
                            </div>
                            <div class="item-info">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}">All I Need</a>
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
                            <div class="item r" data-id="item-5" data-src="http://streaming.radionomy.com/JamendoLounge">
                            <div class="item-media ">
                              <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b4.jpg');"></a>
                            </div>
                            <div class="item-info">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}">Live Radio</a>
                              </div>
                              <div class="item-author text-sm text-ellipsis ">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Radionomy</a>
                              </div>
                              <div class="item-meta text-sm text-muted">
                                  </div>
                      
                      
                            </div>
                          </div>
                        </div>
                          <div class="col-xs-12">
                            <div class="item r" data-id="item-10" data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                            <div class="item-media ">
                              <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/b9.jpg');"></a>
                            </div>
                            <div class="item-info">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}">The Open Road</a>
                              </div>
                              <div class="item-author text-sm text-ellipsis ">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Postiljonen</a>
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
                              <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a4.jpg');"></a>
                            </div>
                            <div class="item-info ">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}">Judith Garcia</a>
                                <div class="text-sm text-muted">13 songs</div>
                              </div>
                            </div>
                          </div>
                        </div>
                          <div class="col-xs-12">
                            <div class="item">
                            <div class="item-media rounded ">
                              <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a9.jpg');"></a>
                            </div>
                            <div class="item-info ">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}">Douglas Torres</a>
                                <div class="text-sm text-muted">20 songs</div>
                              </div>
                            </div>
                          </div>
                        </div>
                          <div class="col-xs-12">
                            <div class="item">
                            <div class="item-media rounded ">
                              <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a2.jpg');"></a>
                            </div>
                            <div class="item-info ">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}">Jean Schneider</a>
                                <div class="text-sm text-muted">8 songs</div>
                              </div>
                            </div>
                          </div>
                        </div>
                          @endforeach
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
  <!-- ############ SHARE END -->

  @endauth

<!-- ############ LAYOUT END-->
  </div>
 
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<!-- <script type="text/javascript">
  $(document).ready(function() {

    $(".btnn").click(function() {
     
      $(this).css("color", "red");

     

    });

  });
</script> -->


<script>



function myCart(elem) {
     var id = $(elem).attr("id");
  
  // alert(id);

    $.ajax({
                method:"POST",
                url: "{{url('/cart')}}",
                data: {
                 "id" :id ,
                 
               "_token": "{{ csrf_token() }}",
                  },
                async: false,
                success : function(data) {
                     
                   

                },

            });

 var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

}
</script>


<script type="text/javascript">
  function myCarttt(element){
      var id = $(element).attr("id");

       
    
       $.ajax({
                method:"POST",
                url: "{{url('/follow')}}",
                data: {
                 "id" :id ,
                 
               "_token": "{{ csrf_token() }}",
                  },
                async: false,
                success : function(data) {
                     console.log(data);
                     if(data == 1){
                     $(".btnnn").click(function() {
     
                     $(this).removeClass('text-secondory');
                      $(this).addClass('text-primary');
                      location.reload();
                         });}
                     else{
                         $(".btnnn").click(function() {
     
                   $(this).removeClass('text-primary');
                      $(this).addClass('text-secondory');
                    location.reload();

    });}

                     
                   

                },

            });

      
}
</script>

 @jquery
@toastr_js
@toastr_render
  @endsection