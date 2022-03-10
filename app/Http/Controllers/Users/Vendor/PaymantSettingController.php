<?php

namespace App\Http\Controllers\Users\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymantSetting;
use App\Vendor;
use App\SellSong;
use App\Price;
use App\Withdraw;
use Auth;

class PaymantSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $autor_id = Auth::guard('vendor')->user()->id;
        $paymant_details = PaymantSetting::where('autor_id','=',$autor_id)->first();
        
        return view('vendor.paymant.create' ,compact('paymant_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->national_card!=null){
            $autor_id = Auth::guard('vendor')->user()->id;
            $paymant_details = PaymantSetting::where('autor_id','=',$autor_id)->first();
            if($paymant_details!=null){
               
               $paymant_details->autor_id = $autor_id;
                 $paymant_details->national_card = $request->national_card;
                  $paymant_details->name = $request->name;
                  $paymant_details->phone = $request->phone;
                   $paymant_details->paymantstatus = $request->paymantstatus;
                  $paymant_details->save();

                   toastr()->success('Paymant Details Update ');
                  return view('vendor.paymant.create' ,compact('paymant_details'));

            }
            else{
                $paymant_details = new PaymantSetting();
                 $paymant_details->autor_id = $autor_id;
                 $paymant_details->national_card = $request->national_card;
                  $paymant_details->name = $request->name;
                  $paymant_details->phone = $request->phone;
                  $paymant_details->paymantstatus = $request->paymantstatus;
                  $paymant_details->save();
                   toastr()->success('Paymant Details Added ');
                 return view('vendor.paymant.create' ,compact('paymant_details'));

            }

        }

       else if($request->email!=null){
            $autor_id = Auth::guard('vendor')->user()->id;
            $paymant_details = PaymantSetting::where('autor_id','=',$autor_id)->first();
            if($paymant_details!=null){
                $paymant_details->autor_id = $autor_id;
                $paymant_details->email = $request->email;
                $paymant_details->paymantstatus = $request->paymantstatus;
                  
                  $paymant_details->save();
                   toastr()->success('Paymant Details Update ');
                  return view('vendor.paymant.create' ,compact('paymant_details'));

            }
            else{
                $paymant_details = new PaymantSetting();

               $paymant_details->autor_id = $autor_id;
                 $paymant_details->email = $request->email;
                 $paymant_details->paymantstatus = $request->paymantstatus;
                  $paymant_details->save();
                   toastr()->success('Paymant Details Added ');
                  return view('vendor.paymant.create' ,compact('paymant_details'));

            }

        }
else if($request->bank_name!=null){
            $autor_id = Auth::guard('vendor')->user()->id;
            $paymant_details = PaymantSetting::where('autor_id','=',$autor_id)->first();
            if($paymant_details!=null){
                $paymant_details->autor_id = $autor_id;
                $paymant_details->account_no = $request->account_no;
                $paymant_details->bank_name = $request->bank_name;
                $paymant_details->paymantstatus = $request->paymantstatus;
                  
                  $paymant_details->save();
                   toastr()->success('Paymant Details Updated ');
                  return view('vendor.paymant.create' ,compact('paymant_details'));

            }
            else{
                $paymant_details = new PaymantSetting();
           $paymant_details->autor_id = $autor_id;
                 $paymant_details->account_no = $request->account_no;
                $paymant_details->bank_name = $request->bank_name;
                $paymant_details->paymantstatus = $request->paymantstatus;
                  $paymant_details->save();
                   toastr()->success('Paymant Details Added ');
                   return view('vendor.paymant.create' ,compact('paymant_details'));

            }

        }


        
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
       $paymant_details = PaymantSetting::where('autor_id','=',$id)->first();
      return view('vendor.paymant.edit',compact('paymant_details'));
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
       
       if($request->national_card!=null){
           $paymant_details = PaymantSetting::where('autor_id','=',$id)->first();
            if($paymant_details!=null){
               
               $paymant_details->autor_id = $id;
                 $paymant_details->national_card = $request->national_card;
                  $paymant_details->name = $request->name;
                  $paymant_details->phone = $request->phone;
                  $paymant_details->paymantstatus = $request->paymantstatus;
                  $paymant_details->save();

                   toastr()->success('Paymant Details Update ');
                  return view('vendor.paymant.create' ,compact('paymant_details'));

            }
            else{
                $paymant_details = new PaymantSetting();
                 $paymant_details->autor_id = $id;
                 $paymant_details->national_card = $request->national_card;
                  $paymant_details->name = $request->name;
                  $paymant_details->phone = $request->phone;
                  $paymant_details->paymantstatus = $request->paymantstatus;
                  $paymant_details->save();
                   toastr()->success('Paymant Details Added ');
                 return view('vendor.paymant.create' ,compact('paymant_details'));

            }

        }

       else if($request->email!=null){
            $paymant_details = PaymantSetting::where('autor_id','=',$id)->first();
            if($paymant_details!=null){
                $paymant_details->autor_id = $id;
                $paymant_details->email = $request->email;
                $paymant_details->paymantstatus = $request->paymantstatus;
                  
                  $paymant_details->save();
                   toastr()->success('Paymant Details Update ');
                  return view('vendor.paymant.create' ,compact('paymant_details'));

            }
            else{
                $paymant_details = new PaymantSetting();

               $paymant_details->autor_id = $id;
                 $paymant_details->email = $request->email;
                 $paymant_details->paymantstatus = $request->paymantstatus;
                  $paymant_details->save();
                   toastr()->success('Paymant Details Added ');
                  return view('vendor.paymant.create' ,compact('paymant_details'));

            }

        }
else if($request->bank_name!=null){
            $paymant_details = PaymantSetting::where('autor_id','=',$id)->first();
            if($paymant_details!=null){
                $paymant_details->autor_id = $id;
                $paymant_details->account_no = $request->account_no;
                $paymant_details->bank_name = $request->bank_name;
                $paymant_details->paymantstatus = $request->paymantstatus;
                  
                  $paymant_details->save();
                   toastr()->success('Paymant Details Updated ');
                  return view('vendor.paymant.create' ,compact('paymant_details'));

            }
            else{
                $paymant_details = new PaymantSetting();
           $paymant_details->autor_id = $id;
                 $paymant_details->account_no = $request->account_no;
                $paymant_details->bank_name = $request->bank_name;
                $paymant_details->paymantstatus = $request->paymantstatus;
                  $paymant_details->save();
                   toastr()->success('Paymant Details Added ');
                   return view('vendor.paymant.create' ,compact('paymant_details'));

            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
     public function paymantPaypal()
    {
        $paymant_paypal = PaymantSetting::all();

        return view('admin.paymant.paypal',compact('paymant_paypal'));
    }
     public function paymantBankDetails()
    {
        $paymant_bankaccount = PaymantSetting::all();

        return view('admin.paymant.bankaccount',compact('paymant_bankaccount'));
    }
     public function paymantWesternUnion()
    {
        $paymant_westernunion = PaymantSetting::all();

        return view('admin.paymant.westernunion',compact('paymant_westernunion'));
    }
     public function paymantWithDraw()
    {
        $autorr = Vendor::where('status', 0)->get();
         foreach ($autorr as $key => $value) {

          $autor = Vendor::findOrFail($value->id);
        $paymant_details = PaymantSetting::where('autor_id','=',$value->id)->first();

         $sellsong = SellSong::all();
          $i=0;
           foreach ($sellsong as $key => $value) {
             foreach(explode(',', $value->autor_id) as $info){
              
                   if($value->id==$info){
                    $i++;
                     $withdraw = Withdraw::where('autor_id','=',$info)->get(); 
                    foreach ($withdraw as $key => $row) {
                        
                         $summ[] = $row->total_sell_song;}
                      # code...
                    
                    $sum =array_sum($summ);
                    
                   
                    
                   

             }}
              
           }

            
                $price = Price::first();
               $totalsellprice = $i*$price->price;
               
           # code...
         }
if($totalsellprice>=3){
        return view('admin.paymant.withdraw',compact('autor'));

    }
    else {
      return view('admin.paymant.withdraww',compact('autor'));
      }
    }

      public function paymantWithDrawDetails($id)
    {         
        $autor = Vendor::findOrFail($id);
        $paymant_details = PaymantSetting::where('autor_id','=',$id)->first();

         $sellsong = SellSong::all();
          $i=0;
           foreach ($sellsong as $key => $value) {
             foreach(explode(',', $value->autor_id) as $info){
              
                   if($id==$info){
                    $i++;
                     $withdraw = Withdraw::where('autor_id','=',$info)->get(); 
                    foreach ($withdraw as $key => $row) {
                        
                         $summ[] = $row->total_sell_song;}
                      # code...
                    
                    $sum =array_sum($summ);
                    
                   
                    
                   

             }}
              
           }

            
                $price = Price::first();
               $totalsellprice = $i*$price->price;

         
        return view('admin.paymant.detailswithdraw', compact('autor','paymant_details','totalsellprice'));
    }

     public function paymantWithDrawDetailsStore($id)
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

               
               $withdraw =  new Withdraw();

               $withdraw->autor_id = $id;
               $withdraw->total_sell_song = $i;
               $withdraw->total_amount=$totalsellprice;
               $withdraw->save();

               $totalsellprice=0;

                toastr()->success('Paymant  Deliver ');

        return view('admin.paymant.detailswithdraw', compact('autor','paymant_details','totalsellprice'));
    }

}
