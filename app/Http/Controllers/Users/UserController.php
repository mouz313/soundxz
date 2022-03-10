<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Countory;
use App\User;
use App\Vendor;
use App\Price;
use App\AutorSong;
use App\SellSong;
use App\PaymantSetting;

use Auth;

class UserController extends Controller
{
    public function logout()
    {
        Auth::guard('vendor')->logout();
         return redirect('/login');
    }
    public function logoutt()
    {
              Auth::logout();
              
         return redirect('/');
    }
    public function userlist()
    {
        $users = User::where('status', 0)->get();
        return view('admin.user.userlist', compact('users'));
    }
    public function userlistblock()
    {
        $users = User::where('status', 1)->get();
        return view('admin.user.userlistblock', compact('users'));
    }
    public function status($status, $id){
        // dd($status,$id);

        if($status==1){
        User::find($id)->update(['status' => $status]);
         toastr()->success('User Status Block ');

            }
            else{

            User::find($id)->update(['status' => $status]);
         toastr()->success('User Status Active ');
            }
       
        return redirect()->back();
        
    }
     public function autorlist()
    {      

        $autor = Vendor::where('status', 0)->get();
        return view('admin.user.autorlist', compact('autor'));
    }
     public function autorlistblock()
    {      

        $autor = Vendor::where('status', 1)->get();
        return view('admin.user.autorlistblock', compact('autor'));
    }
    public function autorstatus($status, $id){
        // dd($status,$id);
        Vendor::find($id)->update(['status' => $status]);
        return redirect()->back();
         toastr()->success('Autor Status Update ');
    }
     public function autordetails($id)
    {         
        $autor = Vendor::findOrFail($id);
        $paymant_details = PaymantSetting::where('autor_id','=',$id)->first();

         $sellsong = SellSong::all();
          $i=0;
           foreach ($sellsong as $key => $value) {
             foreach(explode(',', $value->autor_id) as $info){
                   if($id==$info){
                      $i++;
                      
                   }

             }
              
           }
                $price = Price::first();  
               $totalsellprice = $i*$price->price;


        return view('admin.user.autordetails', compact('autor','paymant_details'));
    }
    public function userdetails($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.userdetails', compact('user'));
    }
     public function songdetails($id)
    {
        $songdetails = AutorSong::findOrFail($id);
        return view('admin.user.songdetails', compact('songdetails'));
    }

     public function delete($id)
    {
        $Vendor =Vendor::find($id);
       $Vendor->delete();
        toastr()->error('Delete Auther ');
         return back();
    }
}
