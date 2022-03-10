@extends('user.layouts.include')

@section('content')

    <!-- ############ PAGE START-->

    <style type="text/css">
        @media screen and (min-width: 480px) {
            .margin {
                margin-right: 200px;
            }
        }

    </style>
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

    <div class="page-content" style="margin-bottom: 200px;" >





        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md" >
                <div class="padding">

@auth
                    <h2 class="widget-title h4 m-b">Trending</h2>
 
                    <div class="row">
                    	

                        @foreach ($songs as $row)


                            <div class="col-xs-4 col-sm-4 col-md-2" >
                                <div class="item r" data-id="item-3"
                                    data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                    <div class="item-media " >

                                        <a href="{{ route('track.details', ['id' => $row->id]) }}"
                                            class="item-media-content"
                                            style="background-image: url('{{ asset($row->img) }}');" ></a>


                                        <div class="item-overlay center">
                                            <a id="{{ $row->id }}" onclick="myCarttt(this)"><button
                                                    class="btn-playpause  playsong" id="playsong" onclick="myFunction()"
                                                    value="{{ url($row->song_pre) }}">Play</button></a>

                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="item-overlay bottom text-right">
                                            <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                            <!-- <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a> -->
                                            <div class="dropdown-menu pull-right black lt"></div>
                                        </div>
                                        <div class="item-title text-ellipsis">
                                            <a style="font-size: 20px;"
                                                href="{{ route('track.details', ['id' => $row->id]) }}">{{ $row->title }}</a>
                                        </div>
                                        <div class="item-author text-sm text-ellipsis ">
                                            <?php
                                            $artist = \App\Vendor::where('status', '=', 0)
                                                ->where('id', '=', $row->autor_id)
                                                ->first();
                                            
                                            ?>
                                            <a style="font-size: 18px;"
                                                href="{{ route('artist.details', ['id' => $artist->id]) }}"
                                                class="text-muted">



                                                {{ $artist->name }}</a>
                                        </div>
                                 <div id="snackbar">Song Add in Cart..</div>
                                        <div class="item-meta text-sm text-muted">

                                          <span style="font-size: 15px;" class="item-meta-stats text-xs ">
                                          	<?php
                                          $price =  \App\Price::pluck('price');?>
                                             
                                        @auth
                                            <?php
                                            
                                            $likes = \App\Like::where('user_id', '=', Auth::user()->id)
                                                ->where('song_id', '=', $row->id)
                                                ->first();
                                            $likess = \App\Like::where('like', '=', 1)
                                                ->where('song_id', '=', $row->id)
                                                ->get();
                                            
                                            //Playsong
                                            $playSong = \App\Playsong::where('user_id', '=', Auth::user()->id)
                                                ->where('song_id', '=', $row->id)
                                                ->first();
                                            $playSongs = \App\Playsong::where('like', '=', 1)
                                                ->where('song_id', '=', $row->id)
                                                ->get();

                                            
                                            ?>

                                            
                                                  @if ($playSong != null)
                                                        <i class="fa fa-play  " style="color: blue"></i>
                                                        {{ $playSongs->count() }}
                                                    @else
                                                        <i class="fa fa-play  text-muted"></i> {{ $playSongs->count() }}

                                                    @endif
                                                   
                                                    <a class="btnn" id="btnn">
                                                      
                                                        @if ($likes != null)
                                                       
                                                            @if ($likes->like == 0)
                                                                <i class="fa fa-heart " aria-hidden="true"
                                                                    id="{{ $row->id }}"
                                                                    onclick="myCartt(this)">{{ $likess->count() }}</i>
                                                    </a>
                                                @else

                                                    <i class="fa fa-heart " style="color: red" aria-hidden="true"
                                                        id="{{ $row->id }}" onclick="myCartt(this)">
                                                        {{ $likess->count() }}</i></a>

                            @endif

                            

                        @else
                        
                            <i class="fa fa-heart " aria-hidden="true" id="{{ $row->id }}"
                                onclick="myCartt(this)">{{ $likess->count() }}</i></a>
                            @endif

                             @if($song_id!=null) 
                             @if($song_id->contains($row->id)==false) 
           <a href="" onclick="myCart(this)" style="color: blue;" id="{{$row->id}}"  class="chek"><i class="fa fa-shopping-cart fa-md"  ></i>${{$price[0]}}</a>
                               @else
                                <a href="#" ><button  class="btn btn-success chek">
                                <i class="fa fa-lock fa-md"></i></button></a>
                                @endif
                                @else
                                   <a href="" onclick="myCart(this)" style="color: blue;" id="{{$row->id}}"  class="chek"><i class="fa fa-shopping-cart fa-md"  ></i>${{$price[0]}}</a>
                                @endif
                           
                                @else

                        
                                    <a href="" ><i class="fa fa-play  text-muted"></i> 0</a>

                                    <a href="{{ route('login' ) }}"><i class="fa fa-heart " aria-hidden="true" id="{{ $row->id }}">0</i></a>
                                     <a href="{{ route('login' ) }}"  class=" chek"><i class="fa fa-shopping-cart fa-md"></i>${{$price[0]}}</a>
                                   

                                </span>
                            </div>
                            @endauth
                               
                      

                        </div>


                    </div>
                </div>
            </div>


            @endforeach


            @else
            <h2 class="widget-title h4 m-b" style="margin-left: 200px;">Trending</h2>
 
                    <div class="row">
                    	

                        @foreach ($songs as $row)


                            <div class="col-xs-4 col-sm-4 col-md-2" style="margin-left: 200px;" >
                                <div class="item r" data-id="item-3"
                                    data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                    <div class="item-media " >

                                        <a href="{{ route('track.details', ['id' => $row->id]) }}"
                                            class="item-media-content"
                                            style="background-image: url('{{ asset($row->img) }}');" ></a>


                                        <div class="item-overlay center">
                                            <a id="{{ $row->id }}" onclick="myCarttt(this)"><button
                                                    class="btn-playpause  playsong" id="playsong" onclick="myFunction()"
                                                    value="{{ url($row->song_pre) }}">Play</button></a>

                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="item-overlay bottom text-right">
                                            <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                            <!-- <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a> -->
                                            <div class="dropdown-menu pull-right black lt"></div>
                                        </div>
                                        <div class="item-title text-ellipsis">
                                            <a style="font-size: 20px;"
                                                href="{{ route('track.details', ['id' => $row->id]) }}">{{ $row->title }}</a>
                                        </div>
                                        <div class="item-author text-sm text-ellipsis ">
                                            <?php
                                            $artist = \App\Vendor::where('status', '=', 0)
                                                ->where('id', '=', $row->autor_id)
                                                ->first();
                                            
                                            ?>
                                            <a style="font-size: 18px;"
                                                href="{{ route('artist.details', ['id' => $artist->id]) }}"
                                                class="text-muted">



                                                {{ $artist->name }}</a>
                                        </div>
                                 <div id="snackbar">Song Add in Cart..</div>
                                        <div class="item-meta text-sm text-muted">

                                          <span style="font-size: 15px;" class="item-meta-stats text-xs ">
                                          	<?php
                                          $price =  \App\Price::pluck('price');?>
                                             
                                        @auth
                                            <?php
                                            
                                            $likes = \App\Like::where('user_id', '=', Auth::user()->id)
                                                ->where('song_id', '=', $row->id)
                                                ->first();
                                            $likess = \App\Like::where('like', '=', 1)
                                                ->where('song_id', '=', $row->id)
                                                ->get();
                                            
                                            //Playsong
                                            $playSong = \App\Playsong::where('user_id', '=', Auth::user()->id)
                                                ->where('song_id', '=', $row->id)
                                                ->first();
                                            $playSongs = \App\Playsong::where('like', '=', 1)
                                                ->where('song_id', '=', $row->id)
                                                ->get();

                                            
                                            ?>

                                            
                                                  @if ($playSong != null)
                                                        <i class="fa fa-play  " style="color: blue"></i>
                                                        {{ $playSongs->count() }}
                                                    @else
                                                        <i class="fa fa-play  text-muted"></i> {{ $playSongs->count() }}

                                                    @endif
                                                   
                                                    <a class="btnn" id="btnn">
                                                      
                                                        @if ($likes != null)
                                                       
                                                            @if ($likes->like == 0)
                                                                <i class="fa fa-heart " aria-hidden="true"
                                                                    id="{{ $row->id }}"
                                                                    onclick="myCartt(this)">{{ $likess->count() }}</i>
                                                    </a>
                                                @else

                                                    <i class="fa fa-heart " style="color: red" aria-hidden="true"
                                                        id="{{ $row->id }}" onclick="myCartt(this)">
                                                        {{ $likess->count() }}</i></a>

                            @endif

                            

                        @else
                        
                            <i class="fa fa-heart " aria-hidden="true" id="{{ $row->id }}"
                                onclick="myCartt(this)">{{ $likess->count() }}</i></a>
                            @endif
                             @if($song_id!=null) 
                             @if($song_id->contains($row->id)==false) 
           <a href="" onclick="myCart(this)" style="color: blue;" id="{{$row->id}}"  class="chek"><i class="fa fa-shopping-cart fa-md"  ></i>${{$price[0]}}</a>
                               @else
                                <a href="#" ><button  class="btn btn-success chek">
                                <i class="fa fa-lock fa-md"></i></button></a>
                                @endif
                                @else
                                   <a href="" onclick="myCart(this)" style="color: blue;" id="{{$row->id}}"  class="chek"><i class="fa fa-shopping-cart fa-md"  ></i>${{$price[0]}}</a>
                                @endif
                           
                                @else

                        
                                    <a href="" ><i class="fa fa-play  text-muted"></i> 0</a>

                                    <a href="{{ route('login' ) }}"><i class="fa fa-heart " aria-hidden="true" id="{{ $row->id }}">0</i></a>
                                     <a href="{{ route('login' ) }}"  class=" chek"><i class="fa fa-shopping-cart fa-md"></i>${{$price[0]}}</a>
                                   

                                </span>
                            </div>
                            @endauth
                               
                      

                        </div>


                    </div>
                </div>
            </div>


            @endforeach

            @endauth




        </div>

    </div>
    <div>





        <!-- ############ SEARCH END -->
        <!-- ############ SHARE START -->
    </div>
    </div>
    </div>
    <!-- ############ SHARE END -->

    </div>

    <script type="text/javascript">
        function myCarttt(element) {
            var id = $(element).attr("id");



            $.ajax({
                method: "POST",
                url: "{{ url('/playSong') }}",
                data: {
                    "id": id,

                    "_token": "{{ csrf_token() }}",
                },
                async: false,
                success: function(data) {
                    console.log(data);
                    if (data == 1) {
                        $(".#").click(function() {

                            $(this).css("color", "red");
                            location.reload();
                        });
                    } else {
                        $(".#").click(function() {

                            $(this).css("color", "black");
                            location.reload();

                        });
                    }




                },

            });


        }
    </script>
    <script type="text/javascript">
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
    </script>

@endsection
