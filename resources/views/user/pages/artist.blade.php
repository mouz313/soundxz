<!-- ############ PAGE START-->
<!-- ############ PAGE START-->
@extends('user.layouts.include')

@section('content')
<!-- ############ PAGE START-->
<?php
$artist =  \App\Vendor::where('status','=',0)->get();;
                
?>
@auth
<div class="page-content">
  <div class="row-col">
    <div class="col-lg-9 b-r no-border-md">
      <div class="padding">
        
         <form action="{{route('search.artist' ) }}" method="get"  >
                     @csrf

    <div class="input-group input-group-lg" >
<?php
$countory =  \App\Countory::all();
?>
      <select id="countory_id"  name="countory_id" class="form-control">
    
                            <option value="">Select Countory</option>
                            @foreach($countory as $row1)
                            <option value="{{$row1->id}}" {{old('countory_id') == $row1->id ? 'selected' : ''}}>{{$row1->name}}({{$row1->code}})</option>
                            @endforeach
                    </select>
      <span class="input-group-btn">
        
      </span>


       <input type="serach" name="query" class="form-control" placeholder="Type keyword">
      <span class="input-group-btn">
        <button class="btn b-a no-shadow white" type="search">Search</button>
      </span>

    </div>
  </form>
        <div class="page-title m-b" style="margin-top: 50px; ">
          <h1 class="inline m-a-0" >Artists</h1>
          <div class="dropdown inline">
            <!-- <button class="btn btn-sm no-bg h4 m-y-0 v-b dropdown-toggle text-primary" data-toggle="dropdown">By name</button> -->
            <div class="dropdown-menu">
              <!-- <a href="#" class="dropdown-item active">
                By name
              </a> -->
              <a href="#" class="dropdown-item">
                Songs
              </a>
            </div>
          </div>
        </div>
        <div data-ui-jp="jscroll" data-ui-options="{
            autoTrigger: false,
            loadingHtml: '<i class=\'fa fa-refresh fa-spin text-md text-muted\'></i>',
            padding: 50,
            nextSelector: 'a.jscroll-next:last'
          }">
          <div class="row row-lg" style="margin-bottom: 400px;">
            @foreach($artist as $row)
                <div class="col-xs-4 col-sm-4 col-md-3">
                	<div class="item">
            			<div class="item-media " style="width:260px; height: 260px; margin-left: 30px;">
                    @if(!empty($row->image))
            				<a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" 
                    style="background-image: url('{{ asset($row->image)  }}');"></a>
                     @else
                       <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a4.jpg');"></a>
                      @endif
            			</div>
            			<div class="item-info text-center">
            				<div class="item-title text-ellipsis">
            					<a href="{{ route('artist.details', ['id' => $row->id] ) }}" style="font-size: 20px;" >{{$row->name}}</a><br>
                      
                      <?php
                 $song =  \App\AutorSong::where('autor_id','=',$row->id)->where('status','=',1)->get();
                  $follow =  \App\Followers::where('autor_id','=',$row->id)->where('like','=',1)->get();
                       ?> 

            					<div class="text-sm text-muted" style="font-size: 18px;">Song {{count($song) ?? 0}}</div>
                      <a href="" style="font-size: 20px;" >Followers {{count($follow) ?? 0}}</a>

            				</div>
            			</div>
            		</div>
            	</div>
            @endforeach
                
             
                
          </div>
         <!--  <a href="scroll.author.html" class="btn btn-sm white rounded jscroll-next">Show More</a> -->
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

<!-- ############ LAYOUT END-->
  </div>
@else
<div style="margin-left: 200px;">
<div class="page-content">
  <div class="row-col">
    <div class="col-lg-9 b-r no-border-md">
      <div class="padding">
        
         <form action="{{route('search.artist' ) }}" method="get"  >
                     @csrf

    <div class="input-group input-group-lg" >
<?php
$countory =  \App\Countory::all();
?>
      <select id="countory_id"  name="countory_id" class="form-control">
    
                            <option value="">Select Countory</option>
                            @foreach($countory as $row1)
                            <option value="{{$row1->id}}" {{old('countory_id') == $row1->id ? 'selected' : ''}}>{{$row1->name}}({{$row1->code}})</option>
                            @endforeach
                    </select>
      <span class="input-group-btn">
        
      </span>


       <input type="serach" name="query" class="form-control" placeholder="Type keyword">
      <span class="input-group-btn">
        <button class="btn b-a no-shadow white" type="search">Search</button>
      </span>

    </div>
  </form>
        <div class="page-title m-b" style="margin-top: 50px; ">
          <h1 class="inline m-a-0" >Artists</h1>
          <div class="dropdown inline">
            <!-- <button class="btn btn-sm no-bg h4 m-y-0 v-b dropdown-toggle text-primary" data-toggle="dropdown">By name</button> -->
            <div class="dropdown-menu">
              <!-- <a href="#" class="dropdown-item active">
                By name
              </a> -->
              <a href="#" class="dropdown-item">
                Songs
              </a>
            </div>
          </div>
        </div>
        <div data-ui-jp="jscroll" data-ui-options="{
            autoTrigger: false,
            loadingHtml: '<i class=\'fa fa-refresh fa-spin text-md text-muted\'></i>',
            padding: 50,
            nextSelector: 'a.jscroll-next:last'
          }">
          <div class="row row-lg" style="margin-bottom: 400px;">
            @foreach($artist as $row)
                <div class="col-xs-4 col-sm-4 col-md-3">
                  <div class="item">
                  <div class="item-media " style="width:260px; height: 260px; margin-left: 30px;">
                    @if(!empty($row->image))
                    <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" 
                    style="background-image: url('{{ asset($row->image)  }}');"></a>
                     @else
                       <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a4.jpg');"></a>
                      @endif
                  </div>
                  <div class="item-info text-center">
                    <div class="item-title text-ellipsis">
                    
                      <a href="{{ route('artist.details', ['id' => $row->id] ) }}" style="font-size: 20px;" >{{$row->name}}</a><br>
                     
                      
                      <?php
                 $song =  \App\AutorSong::where('autor_id','=',$row->id)->where('status','=',1)->get();
                  $follow =  \App\Followers::where('autor_id','=',$row->id)->where('like','=',1)->get();
                       ?> 

                      <div class="text-sm text-muted" style="font-size: 18px;">Song {{count($song) ?? 0}}</div>
                      <a href="" style="font-size: 20px;" >Followers {{count($follow) ?? 0}}</a>

                    </div>
                  </div>
                </div>
              </div>
            @endforeach
                
             
                
          </div>
         <!--  <a href="scroll.author.html" class="btn btn-sm white rounded jscroll-next">Show More</a> -->
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

<!-- ############ LAYOUT END-->
  </div>


@endauth
<!-- build:js scripts/app.min.js-->
  @endsection
