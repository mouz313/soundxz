
<!-- ############ PAGE START-->
@extends('user.layouts.include')

@section('content')
@section('content')

@auth
<div class="padding">
      <form action="{{route('search.keyword' ) }}" method="get"  >
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

<?php
$category =  \App\Song::all();
?>
       <select id="category_id"   name="category_id" class="form-control">
    
                            <option value="">Select Category</option>
                            @foreach($category as $row2)
                            <option value="{{$row2->id}}" {{old('category_id') == $row2->id ? 'selected' : 
                              ''}}>{{$row2->title}} </option>
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
  <p class="m-b-md"><strong>{{$songs->count()}}</strong> Results found for: <strong>Keyword</strong></p>
  <div class="m-y">
    <div class="row item-list item-list-lg item-list-by m-b">
      @foreach($songs as $row)
          <div class="col-xs-12" style="margin-bottom: 480px;">
            <div class="item r" data-id="item-9" data-src="http://api.soundcloud.com/tracks/264094434/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
            <div class="item-media ">
              <a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('{{ asset($row->img) }}');"></a>
              <div class="item-overlay center">
                <button  class="btn-playpause  playsong" id="playsong"  onclick="myFunction()"     value="{{url($row->song_pre)}}">Play</button>
              </div>
            </div>
            <div class="item-info">
              <div class="item-overlay bottom text-right">
                <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                <div class="dropdown-menu pull-right black lt"></div>
              </div>
              <div class="item-title text-ellipsis">
                <a href="{{ route('track.details',['id' => $row->id]) }}" style="font-size: 18px;">{{$row->title}}</a>
              </div>
              <div class="item-author text-sm text-ellipsis ">
                                                 <?php

                                         $category =  \App\Song::where('id','=',$row->category_id)->first();
                                         $autor =  \App\vendor::where('status','=',0)->where('id','=',$row->autor_id)->first();

  
                                            ?>
                <a href="{{ route('artist.details', ['id' => $autor->id] ) }}" class="text-muted" style="font-size: 15px;">{{$autor->name}}</a>
              </div>
              <div class="item-meta text-sm text-muted">
                    <span class="item-meta-tag visible-list"><a href="browse.html"></a></span>
                  </div>
      
              <div class="item-except visible-list text-sm text-muted h-2x m-t-sm" style="font-size: 15px;">
                {{$row->description}}
              </div>
      
            </div>
          </div>
        </div>
         @endforeach
    </div>
    <div>
    
  </div>
</div>

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
               <form action="#" class="m-b-md">
                <div class="input-group input-group-lg">
                  <input type="search"  class="form-control" placeholder="Type keyword" data-ui-toggle-class="hide" data-ui-target="#search-result">
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
                            <div class="item r" data-id="item-11" data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                            <div class="item-media ">
                              <a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('images/b10.jpg');"></a>
                            </div>
                            <div class="item-info">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('track.details',['id' => $row->id]) }}">Spring</a>
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
                            <div class="item r" data-id="item-1" data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                            <div class="item-media ">
                              <a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('images/b0.jpg');"></a>
                            </div>
                            <div class="item-info">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('track.details',['id' => $row->id]) }}">Pull Up</a>
                              </div>
                              <div class="item-author text-sm text-ellipsis ">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Summerella</a>
                              </div>
                              <div class="item-meta text-sm text-muted">
                                  </div>
                      
                      
                            </div>
                          </div>
                        </div>
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
                            <div class="item r" data-id="item-2" data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                            <div class="item-media ">
                              <a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('images/b1.jpg');"></a>
                            </div>
                            <div class="item-info">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('track.details',['id' => $row->id]) }}">Fireworks</a>
                              </div>
                              <div class="item-author text-sm text-ellipsis ">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Kygo</a>
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
                              <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a5.jpg');"></a>
                            </div>
                            <div class="item-info ">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}">Judy Woods</a>
                                <div class="text-sm text-muted">23 songs</div>
                              </div>
                            </div>
                          </div>
                        </div>
                          <div class="col-xs-12">
                            <div class="item">
                            <div class="item-media rounded ">
                              <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a7.jpg');"></a>
                            </div>
                            <div class="item-info ">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}">Richard Carr</a>
                                <div class="text-sm text-muted">6 songs</div>
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

<!-- ############ LAYOUT END-->
  </div>
 
 @else
 <div style="margin-left: 200px;">
 <div class="padding">
      <form action="{{route('search.keyword' ) }}" method="get"  >
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

<?php
$category =  \App\Song::all();
?>
       <select id="category_id"   name="category_id" class="form-control">
    
                            <option value="">Select Category</option>
                            @foreach($category as $row2)
                            <option value="{{$row2->id}}" {{old('category_id') == $row2->id ? 'selected' : 
                              ''}}>{{$row2->title}} </option>
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
  <p class="m-b-md"><strong>{{$songs->count()}}</strong> Results found for: <strong>Keyword</strong></p>
  <div class="m-y">
    <div class="row item-list item-list-lg item-list-by m-b">
      @foreach($songs as $row)
          <div class="col-xs-12" style="margin-bottom: 480px;">
            <div class="item r" data-id="item-9" data-src="http://api.soundcloud.com/tracks/264094434/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
            <div class="item-media ">
              <a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('{{ asset($row->img) }}');"></a>
              <div class="item-overlay center">
                <button  class="btn-playpause  playsong" id="playsong"  onclick="myFunction()"     value="{{url($row->song_pre)}}">Play</button>
              </div>
            </div>
            <div class="item-info">
              <div class="item-overlay bottom text-right">
                <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                <div class="dropdown-menu pull-right black lt"></div>
              </div>
              <div class="item-title text-ellipsis">
                <a href="{{ route('track.details',['id' => $row->id]) }}" style="font-size: 18px;">{{$row->title}}</a>
              </div>
              <div class="item-author text-sm text-ellipsis ">
                                                 <?php

                                         $category =  \App\Song::where('id','=',$row->category_id)->first();
                                         $autor =  \App\vendor::where('status','=',0)->where('id','=',$row->autor_id)->first();

  
                                            ?>
                <a href="{{ route('artist.details', ['id' => $autor->id] ) }}" class="text-muted" style="font-size: 15px;">{{$autor->name}}</a>
              </div>
              <div class="item-meta text-sm text-muted">
                    <span class="item-meta-tag visible-list"><a href="browse.html"></a></span>
                  </div>
      
              <div class="item-except visible-list text-sm text-muted h-2x m-t-sm" style="font-size: 15px;">
                {{$row->description}}
              </div>
      
            </div>
          </div>
        </div>
         @endforeach
    </div>
    <div>
    
  </div>
</div>

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
               <form action="#" class="m-b-md">
                <div class="input-group input-group-lg">
                  <input type="search"  class="form-control" placeholder="Type keyword" data-ui-toggle-class="hide" data-ui-target="#search-result">
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
                            <div class="item r" data-id="item-11" data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                            <div class="item-media ">
                              <a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('images/b10.jpg');"></a>
                            </div>
                            <div class="item-info">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('track.details',['id' => $row->id]) }}">Spring</a>
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
                            <div class="item r" data-id="item-1" data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                            <div class="item-media ">
                              <a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('images/b0.jpg');"></a>
                            </div>
                            <div class="item-info">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('track.details',['id' => $row->id]) }}">Pull Up</a>
                              </div>
                              <div class="item-author text-sm text-ellipsis ">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Summerella</a>
                              </div>
                              <div class="item-meta text-sm text-muted">
                                  </div>
                      
                      
                            </div>
                          </div>
                        </div>
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
                            <div class="item r" data-id="item-2" data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                            <div class="item-media ">
                              <a href="{{ route('track.details',['id' => $row->id]) }}" class="item-media-content" style="background-image: url('images/b1.jpg');"></a>
                            </div>
                            <div class="item-info">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('track.details',['id' => $row->id]) }}">Fireworks</a>
                              </div>
                              <div class="item-author text-sm text-ellipsis ">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="text-muted">Kygo</a>
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
                              <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a5.jpg');"></a>
                            </div>
                            <div class="item-info ">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}">Judy Woods</a>
                                <div class="text-sm text-muted">23 songs</div>
                              </div>
                            </div>
                          </div>
                        </div>
                          <div class="col-xs-12">
                            <div class="item">
                            <div class="item-media rounded ">
                              <a href="{{ route('artist.details', ['id' => $row->id] ) }}" class="item-media-content" style="background-image: url('images/a7.jpg');"></a>
                            </div>
                            <div class="item-info ">
                              <div class="item-title text-ellipsis">
                                <a href="{{ route('artist.details', ['id' => $row->id] ) }}">Richard Carr</a>
                                <div class="text-sm text-muted">6 songs</div>
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

<!-- ############ LAYOUT END-->
  </div>

  @endauth
@endsection