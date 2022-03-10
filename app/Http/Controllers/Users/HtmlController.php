<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AutorSong;
use App\Vendor;
use App\AlbumSong;
use App\SellSong;
use App\Like;

use Auth;

class HtmlController extends Controller
{

   public function index()
    {    
     $artist =  \App\Vendor::where('status','=',0)->get();
     $songs =  \App\AutorSong::where('status','=',1)->latest()->get();
      
      if(Auth::check()){

      $sell_song = SellSong::where('user_id','=',Auth::user()->id)->get();
     

       if($sell_song->count()==0){
             $song_id=null;
       }
       else{
        foreach ($sell_song as $key => $value) {

           $song_id = explode(',', $value->song_id);
           $autor_id = explode(',', $value->autor_id);

           $song_id = AutorSong::whereIn('id',$song_id)->whereIn('autor_id',$autor_id)
               ->groupBy('id')
               
               ->pluck('id');
            
          

        }}}
        else{
          $song_id=null;
        }

    return view('user.index' , compact('artist','songs','song_id')); 

    }
    public function browser(){
        return view("user.pages.browser");


    }
    public function chart(){
        return view("user.pages.chart");
    }
    public function artist(){
        return view("user.pages.artist");
    }
    public function search(){
        $songs = AutorSong::where('status','=',1)->get();
        
        return view("user.pages.search",compact('songs'));
    }
    public function tracks(){

        return view("user.pages.tracks");
    }
     public function profile(){
       $like = Like::where('user_id','=',Auth::user()->id)->where('like','=',1)->get();
    
    if($like->count()==0){
         $songs=[];
    }
        else{foreach ($like as $key => $value) {
            $songs[] = AutorSong::where('id','=',$value->song_id)->where('status','=',1)->first();
           
        }}


         $sell_song = SellSong::where('user_id','=',AUth::user()->id)->get();

       if($sell_song->count()==0){
             $song_id=null;
       }
       else{
        foreach ($sell_song as $key => $value) {

           $song_id = explode(',', $value->song_id);
           $autor_id = explode(',', $value->autor_id);

           $song_id = AutorSong::whereIn('id',$song_id)->whereIn('autor_id',$autor_id)
               ->groupBy('id')
               
               ->pluck('id');
            
          

        }}

       
        return view("user.pages.profile",compact('songs','song_id'));
    }
    public function playList(){
       $like = Like::where('user_id','=',Auth::user()->id)->where('like','=',1)->get();
    
    if($like->count()==0){
         $songs=[];
    }
        else{foreach ($like as $key => $value) {
            $songs[] = AutorSong::where('id','=',$value->song_id)->where('status','=',1)->first();
           
        }}


         $sell_song = SellSong::where('user_id','=',AUth::user()->id)->get();
     
       if($sell_song->count()==0){
             $song_id=null;
       }
       else{
        foreach ($sell_song as $key => $value) {

           $song_id = explode(',', $value->song_id);
           $autor_id = explode(',', $value->autor_id);

           $song_id = AutorSong::whereIn('id',$song_id)->whereIn('autor_id',$autor_id)
               ->groupBy('id')
               
               ->pluck('id');
            
          

        }}

       
        return view("user.pages.playlist",compact('songs','song_id'));
    }
    public function likes(){
        $like = Like::where('user_id','=',Auth::user()->id)->where('like','=',1)->get();
    
    if($like->count()==0){
         $songs=[];
    }
        else{foreach ($like as $key => $value) {
            $songs[] = AutorSong::where('id','=',$value->song_id)->where('status','=',1)->first();
           
        }}


         $sell_song = SellSong::where('user_id','=',AUth::user()->id)->get();

       if($sell_song->count()==0){
             $song_id=null;
       }
       else{
        foreach ($sell_song as $key => $value) {

           $song_id = explode(',', $value->song_id);
           $autor_id = explode(',', $value->autor_id);

           $song_id = AutorSong::whereIn('id',$song_id)->whereIn('autor_id',$autor_id)
               ->groupBy('id')
               
               ->pluck('id');
            
          

        }}

       
        return view("user.pages.likes",compact('songs','song_id'));

    }
    public function artist_details($id){
        $vendor = Vendor::where('id','=',$id)->where('status','=',0)->first();
        $album = AlbumSong::where('autor_id','=',$id)->where('status','=',0)->get();
        $songs = AutorSong::where('autor_id','=',$id)->where('status','=',1)->latest()->get();
          
//PLAYLIST
        if(Auth::check()==false){
          $sell_song=0;

        }
         else{$sell_song = SellSong::where('user_id','=',Auth::user()->id)->get();
        }
         
         
       if($sell_song===0 || $sell_song->count()===0 ){
             $song_id=null;
       }
       
       else{
        foreach ($sell_song as $key => $value) {
                   
           $song_id = explode(',', $value->song_id);
           $autor_id = explode(',', $value->autor_id);
           

            if(Auth::check()==false){
              $song_id=null;
            }


           else {
            $song_id = AutorSong::whereIn('id',$song_id)->whereIn('autor_id',$autor_id)
               ->groupBy('id')
               
               ->pluck('id');
             }
            
          

        }}
        //END PLAYLIST


        return view("user.pages.front.artist_details",compact('vendor','album','songs','song_id'));
    }
    public function track_details($id){
             $song = AutorSong::where('id','=',$id)->where('status','=','1')->first();
            $songs = AutorSong::where('status','=',1)->latest()->get();

        return view("user.pages.front.track_details",compact('song','songs'));
    }
public function searchKeyword(){
            $search_text = $_GET['query'];
            $category_id = $_GET['category_id'];
            $countory_id = $_GET['countory_id'];
          
           if($search_text!=null && $category_id==null && $countory_id==null ){
            $songs = AutorSong::where('title','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
           
            if($songs->count()==0){
              return view("user.pages.searchthree");

           }
            else{
               return view("user.pages.serachtwo",compact('songs'));
            }
        }
            else if($search_text==null && $category_id!=null && $countory_id==null ){

                 $songs = AutorSong::where('category_id','LIKE','%'.$category_id.'%')->where('status','=',1)->get();
            
           if($songs->count()==0){
              return view("user.pages.searchthree");

           }
            else{
               return view("user.pages.serachtwo",compact('songs'));
            }
            }
             else if($search_text==null && $category_id==null && $countory_id!=null ){
               $songs = AutorSong::where('countory_id','LIKE','%'.$countory_id.'%')->where('status','=',1)->get();
           if($songs->count()==0){
              return view("user.pages.searchthree");

           }
            else{
               return view("user.pages.serachtwo",compact('songs'));
            }
                    
                }
                else if($search_text!=null && $category_id!=null && $countory_id==null ){
               $songs = AutorSong::where('category_id','LIKE','%'.$category_id.'%')->where('status','=',1)->where('title','LIKE','%'.$search_text.'%')->get();
           
              if($songs->count()==0){
              return view("user.pages.searchthree");

           }
            else{
               return view("user.pages.serachtwo",compact('songs'));
            }     
                }
                else if($search_text!=null && $category_id==null && $countory_id!=null ){
               $songs = AutorSong::where('countory_id','LIKE','%'.$countory_id.'%')->where('status','=',1)->where('title','LIKE','%'.$search_text.'%')->get();
           
               if($songs->count()==0){
              return view("user.pages.searchthree");

           }
            else{
               return view("user.pages.serachtwo",compact('songs'));
            }
                    
                }
                else if($search_text!=null && $category_id!=null && $countory_id!=null ){
               $songs = AutorSong::where('countory_id','LIKE','%'.$countory_id.'%')->where('status','=',1)->where('title','LIKE','%'.$search_text.'%')->where('category_id','LIKE','%'.$category_id.'%')->get();
           
               if($songs->count()==0){
              return view("user.pages.searchthree");

           }
            else{
               return view("user.pages.serachtwo",compact('songs'));
            }   
                }
                else if($search_text==null && $category_id!=null && $countory_id!=null ){
               $songs = AutorSong::where('countory_id','LIKE','%'.$countory_id.'%')->where('status','=',1)->where('category_id','LIKE','%'.$category_id.'%')->get();
           
               if($songs->count()==0){
              return view("user.pages.searchthree");

           }
            else{
               return view("user.pages.serachtwo",compact('songs'));
            }
                    
                }
                else{
              return back();
            }

                 


                 
           


    }


    public function searchArtist(){
            $search_text = $_GET['query'];
            
            $countory_id = $_GET['countory_id'];
          


           if($search_text!=null &&  $countory_id==null ){

            $songs = Vendor::where('name','LIKE','%'.$search_text.'%')->where('status','=',0)->get();
              
            if($songs->count()==0){
              return view("user.pages.artisattwo");

           }
            else{

               return view("user.pages.artistone",compact('songs'));
            }
        }
            
             else if($search_text==null &&  $countory_id!=null ){
               $songs = Vendor::where('countory_id','LIKE','%'.$countory_id.'%')->where('status','=',0)->get();
           if($songs->count()==0){
              return view("user.pages.artisattwo");

           }
            else{
               return view("user.pages.artistone",compact('songs'));
            }     
                }
               
                else if($search_text!=null && $countory_id!=null ){
               $songs = Vendor::where('countory_id','LIKE','%'.$countory_id.'%')->where('status','=',0)->where('name','LIKE','%'.$search_text.'%')->get();
           
              if($songs->count()==0){
              return view("user.pages.artisattwo");

           }
            else{
               return view("user.pages.artistone",compact('songs'));
            }
                }
                
            else{
              return back();
            }

    }

}
