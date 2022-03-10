<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\SellSong;
use App\AutorSong;
use App\Vendor;
use App\AlbumSong;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
    public function userprofile()
    {
        return view('user.users.profile');
    }
    public function userprofileupdate(Request $request)
    {
         // dd($request);
         $id = Auth::user()->id;
            // dd( $id);
             $user =User::find($id);

                  

             if($request->countory_id == null){

                $user->name = $request->name;
                $user->email = $request->email;
                $user->number = $request->number;
                                                  }
               else{
                $user->name = $request->name;
                $user->email = $request->email;
                $user->countory_id = $request->countory_id;
                $user->number = $request->number;

               }
               $user->save();
               toastr()->success(' Profile Update ');
                return redirect()->back();
}
 public function userpasswordupdate(Request $request)
    {
         // dd($request);
         $id = Auth::user()->id;
            // dd( $id);
             $user =User::find($id);

                  

              $user->password = Hash::make(($request->password));
               $user->save();
               toastr()->success(' Password Update ');
                return redirect()->back();
}
                
    
}
