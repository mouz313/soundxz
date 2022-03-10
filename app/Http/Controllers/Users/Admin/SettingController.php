<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use App\Countory;
use App\City;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting = Setting::first();

        return view('admin.setting.create',compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

           $chek = Setting::get();
        if($chek->isEmpty()) {

            $setting = new Setting();

            $setting->title = $request->title;
            $setting->link = $request->link;

            if ($request->hasfile('image')) {
            $image1 = $request->file('image');
            $name = time() . 'image' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'image/';
            $image1->move($destinationPath, $name);
            $setting->image = 'image/' . $name;
        }

         $setting->save();
         toastr()->success('Added Setting ');
           return back();


        }

        else{

            $setting = Setting::find(1);

            $setting->title = $request->title;
            $setting->link = $request->link;

            if ($request->hasfile('image')) {
            $image1 = $request->file('image');
            $name = time() . 'image' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'image/';
            $image1->move($destinationPath, $name);
            $setting->image = 'image/' . $name;
            $setting->save();
            toastr()->success('Update Setting ');
            return back();
}}
        

    }
    public function resetpassword(Request $request)
    {
       
         $this->validate($request, [
           
         'password' => ['required', 'string', 'min:8', 'confirmed'],
           
                                   ]);
           $vendor = Vendor::where('email', Auth::guard('vendor')->user()->email)->first();
                                                       //or wherever you want

             $vendor->password = Hash::make($request->password);
             $vendor->update();
              toastr()->success('Update Your Password  ');
             return back(); //or $user->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(cr $cr)
    {
        //
    }
    public function country_create()
    {
        return view('admin.countory.create');
    }
    public function country_store(Request $request)
    {

        // dd($request);
        $counory = new Countory();

        $counory->name = $request->name;
        $counory->code = $request->code;
        $counory->save();
         toastr()->success('Added Countory Name');
         return back();
    }
    public function country_show()
    {

       
        $countory = Countory::all();
         return view('admin.countory.show',compact('countory'));
        
    }
    public function country_edit($id)
    {
            
       
        return view('admin.countory.edit',[
            'countory' => Countory::findOrFail($id)
        ]);
        
    }
    

     public function country_update(Request $request, $id)
    {
        // dd($request,$id);
       
        $country = Countory::findOrFail($id);
        $country->name = $request->name;
        $country->code = $request->code;
        $country->save();
        
           $countory = Countory::all();
            toastr()->success('Update Countory Name');
         return view('admin.countory.show',compact('countory'));
        
    }

    public function country_destroy($id)
    {
        

       $countory =Countory::find($id);
        $countory->delete();
        toastr()->error('Delete Countory Name');
         return back();
    }

    // public function city_create()
    // {
    //     $countory= Countory::all();
    //     return view('admin.countory.city.create',compact('countory'));
    // }
    public function city_store(Request $request)
    {
                $chek = City::Where('countory_id','=',$request->countory_id)->first();
        // dd($chek);
                if($chek->name==$request->name){
                    toastr()->success('This City Already Added');
                       return back();
                }
                else{
       
                    $city = new City();
                    $city->countory_id = $request->countory_id;
                    $city->name = $request->name;
                    
                    $city->save();
                     toastr()->success('Added City Name');
                     return back();}
    }

     public function city_show()
    {

        $countory= Countory::all();
        $city = City::all();
         return view('admin.countory.city.index',compact('city','countory'));
        
    }
    public function city_edit($id)
    {
            
       
        return view('admin.countory.city.edit',[
            'city' => City::findOrFail($id),
            'countory'=>Countory::all(),
        ]);
        
    }
    

     public function city_update(Request $request, $id)
    {
        // dd($request,$id);

       
        $city = City::findOrFail($id);


        $city->countory_id = $request->countory_id;
        $city->name = $request->name;
        
        $city->save();
       
       $countory= Countory::all();
        $city = City::all();
          toastr()->success('Update City Name');
         return view('admin.countory.city.index',compact('city','countory'));
         
      }
    public function city_destroy($id)
    {
        

       $city =City::find($id);
        $city->delete();
        toastr()->error('Delete Countory Name');
         return back();
    }

}
