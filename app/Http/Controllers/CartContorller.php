<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AutorSong;
use Auth;
use App\Like;
use App\Followers;
use App\PlaySong;
use Cart;

class CartContorller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartCollection = Cart::getContent();
         // $subTotal = Cart::getSubTotal();
         $count = $cartCollection->count();
         // dd($cartCollection,$subTotal,$count);

         
             $subTotal = $count * 0.10;
         
        
         
        
          
        return view('user.cart.cart',compact('cartCollection', 'subTotal','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cartCollection = Cart::getContent();

              
         // $subTotal = Cart::getSubTotal();
         $count = $cartCollection->count();
         $subTotal = $count * 0.10;
        return view('user.layouts.sidebar',compact('cartCollection', 'subTotal','count'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Cart::remove($id);
        toastr()->error('Remove Song');
       return back();
    }
     public function cart(Request $request)
    {
       $cartsong = AutorSong::find($request->id);

      $autor_id =$cartsong->autor_id;
        $chek= 0.10;
       Cart::add($cartsong->id,    $cartsong->title, $chek , 1, array());
       
        $chek = Cart::get($request->id);
           // Cart::clear();
        $subTotal = Cart::getSubTotal();
         // toastr()->success('Song Add in Cart');
        // return response()->json($chek);

         return back();
         
    }


    public function like(Request $request)
    {
         $chek = Like::where('user_id','=',Auth::user()->id)->where('song_id','=',$request->id)->first();

  if(!$chek){
        $like = new Like();
        
        $like->song_id  = $request->id;
        $like->user_id = Auth::user()->id;
        $like->like = 1;
        $like->save();
         return response()->json($like->like);
    }
        else if($chek->like == 0){
            $chek->like = 1;
            $chek->update();
            return response()->json($chek->like);
        }

        else{
            $chek->like = 0;
            $chek->update();
            return response()->json($chek->like);

        }
      
         // toastr()->success('Song Add in Cart');
       
        
         
    }
     public function follow(Request $request)
    {
         $chek = Followers::where('user_id','=',Auth::user()->id)->where('autor_id','=',$request->id)->first();

  if(!$chek){
        $followers = new Followers();
        
        $followers->autor_id  = $request->id;
        $followers->user_id = Auth::user()->id;
        $followers->like = 1;
        $followers->save();
         return response()->json($followers->like);
    }
        else if($chek->like == 0){
            $chek->like = 1;
            $chek->update();
            return response()->json($chek->like);
        }

        else{
            $chek->like = 0;
            $chek->update();
            return response()->json($chek->like);

        }
      
         // toastr()->success('Song Add in Cart');
       
        
         
    }

     public function playSong(Request $request)
    {   
         $chek = PlaySong::where('user_id','=',Auth::user()->id)->where('song_id','=',$request->id)->first();

  if(!$chek){
        $playSong= new PlaySong();
        
        $playSong->song_id  = $request->id;
        $playSong->user_id = Auth::user()->id;
        $playSong->like = 1;
        $playSong->save();
         return response()->json($playSong->like);
    }
        

        else{
            $chek->like = 1;
            $chek->update();
            return response()->json($chek->like);

        }
      
         // toastr()->success('Song Add in Cart');
       
        
         
    }
}
