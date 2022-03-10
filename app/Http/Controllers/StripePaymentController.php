<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use Cart;
use App\SellSong;
use Auth;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe($id , Request $request)
    {   

          	
        $cartCollection = Cart::getContent();


         // $subTotal = Cart::getSubTotal();
         $count = $cartCollection->count();
         $subTotal = $count * 0.10;
       if($request->paymant == 'stripe'){
        return view('stripe',compact('id','cartCollection','count','subTotal'));}
        else{
            return view('user.paypal.paywithpaypal',compact('id','cartCollection','count','subTotal'));
        }
    }
     public function confirm()
    {
       
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {   
        $invoice = new SellSong();

        
        

       $lastInvoiceID = $invoice->pluck('id')->first();
        $newInvoiceID = $lastInvoiceID + 1;
          $name = $request->song_name;
           $s_id = $request->song_id;
           $pricee = $request->price;
           $autor_id = $request->autor_id;



           $invoice->user_id = Auth::user()->id;
           if($newInvoiceID<10){
           $invoice->invoice_id = 'SA0000'.$newInvoiceID;}
           else{
             $invoice->invoice_id = 'SA000'.$newInvoiceID;
           }
           $invoice->song_name = implode(',' ,$name);
           $invoice->song_id = implode(',' ,$s_id);
           $invoice->price = implode(',' ,$pricee);
            $invoice->autor_id = implode(',' ,$autor_id);

           $invoice->subtotal = $request->subtotal;
            $invoice->quantity = $request->quantity;

             $invoice->save();


        \Stripe\Stripe::setApiKey('sk_test_51IZ8jfD7gIuku9edjNovI1rg9YgVz5plHcGJNG2TSEL6q4pShoZgERKaErsm9v3txChjF7KWUbJtLVBIgIhWZP2m00g46FzgWt');
        \Stripe\Charge::create ([
                "amount" =>  100*100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
  
        Session::flash('success', 'Payment successful!');
          
        return view('user.cart.confirmpaymant');
    }
}