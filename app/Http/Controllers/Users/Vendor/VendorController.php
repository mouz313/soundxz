<?php

namespace App\Http\Controllers\Users\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Vendor;
use App\Countory;
use App\AutorSong;
use App\AlbumSong;
use App\City;
use App\Followers;
use App\SellSong;
use App\Price;
class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
    }

    public function index()
    {      $autor_id = Auth::guard('vendor')->user()->id;
           $autor = Vendor::findOrFail($autor_id);
           $allsong = AutorSong::where('status','=','1')->where('autor_id','=',$autor_id)->get();
           $pendingsong = AutorSong::where('status','=','0')->where('autor_id','=',$autor_id)->get();
           $allalbum = AlbumSong::where('status','=','0')->where('autor_id','=',$autor_id)->get();
           $pendingalbum = AlbumSong::where('status','=','1')->where('autor_id','=',$autor_id)->get();
            $i=0;
           $sellsong = SellSong::all();
           foreach ($sellsong as $key => $value) {
             foreach(explode(',', $value->autor_id) as $info){
                   if($autor_id==$info){
                      $i++;
                   }

             }
              
           }
           $price = Price::first();
               $totalsellprice = $i*$price->price;
               
           
        if ($autor->status == 0) {
         
            return view('vendor.index',compact('allsong','pendingsong','allalbum','pendingalbum','totalsellprice'));
             toastr()->success('LogIn successfully ');
             
        }

        else{
           toastr()->error('You are Unautrized Persson ');
          return view('auth.vendor-login');
         

        } 

       
        
    }
    public function vendorlogout()
    {
        Auth::logout();
        return redirect()->back();
    }
     public function profile($id)
    {
         $profile = Vendor::findOrFail($id);
         $data = Countory::all();
         $autor_id = Auth::guard('vendor')->user()->id;
         $followers = Followers::where('autor_id','=', $autor_id)->where('like','=',1)->get();
       
        
        return view('vendor.layouts.profile',compact('profile','data','followers'));
    }
    public function citydata($id){
  
         $city = City::where('countory_id','=',$id)->get();

         return response()->json($city);
    }
     public function update(Request $request)
    {

        // dd($request);
           
      

       

         $id = Auth::guard('vendor')->user()->id;
            // dd( $id);
             $vendor =Vendor::find($id);



             if($request->countory_id == null){

                $vendor->name = $request->name;
        $vendor->email = $request->email;
        
        $vendor->address = $request->address;
        $vendor->number = $request->number;
         $vendor->description = $request->description;
          $vendor->education = $request->education;



         if ($request->hasfile('image')) {
            $image1 = $request->file('image');
            $name = time() . 'image' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'image/profile/';
            $image1->move($destinationPath, $name);
            $vendor->image = 'image/profile/' . $name;
        }



             }else{



        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->countory_id = $request->countory_id;
        $vendor->city_id = $request->city_id;
        $vendor->address = $request->address;
        $vendor->number = $request->number;
        $vendor->description = $request->description;
        $vendor->education = $request->education;



         if ($request->hasfile('image')) {
            $image1 = $request->file('image');
            $name = time() . 'image' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'image/profile/';
            $image1->move($destinationPath, $name);
            $vendor->image = 'image/profile/' . $name;
        }
         }


             $vendor->save();
       

        return redirect()->back();

        toastr()->success(' Profile Update ');
    }

}



