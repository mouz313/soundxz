<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Vendor;
use App\User;
use App\Countory;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:vendor');
    }

    public function showRegisterForm()
    {
        $data = Countory::all();
        return view('auth.vendor-register',compact('data'));
    }
    public function fetchdata($id){
  
         $city = City::where('countory_id','=',$id)->get();

         return response()->json($city);
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:vendors'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'number' => ['required', 'string'],
            'countory_id' => ['required', 'string'],
            'city_id' => ['required', 'string'],
             'address' => ['required', 'string'],
        ]);

       
       $vendor = new Vendor();

      
       $vendor->name = $request->name;
       $vendor->email = $request->email;
       $vendor->password = Hash::make(($request->password));
       $vendor->countory_id = $request->countory_id;
       $vendor->city_id = $request->city_id;
       $vendor->address = $request->address;
        $vendor->number = $request->number;
       $vendor->description = $request->description;

       
         if ($request->hasfile('img')) {
            $image1 = $request->file('img');
            $name = time() . 'image' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'image/card/';
            $image1->move($destinationPath, $name);
           $vendor->img = 'image/card/' . $name;
        }
         



        $vendor->save();


        return redirect()->intended(route('vendor.dashboard'));
    }
    
    


}
