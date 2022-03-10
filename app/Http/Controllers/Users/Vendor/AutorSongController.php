<?php

namespace App\Http\Controllers\Users\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Song;
use App\Vendor;
use App\AutorSong;
use App\AlbumSong;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AutorSongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Song::all();
        $song =  AutorSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->where('status','=','1')->get();
        $albums = AlbumSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->where('status','=','0')->get();

        

        return view('vendor.song.create',compact('category','song','albums'));


    }

     public function index2()
    {
        $category = Song::all();
        $song =  AutorSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->where('status','=','0')->get();
        $albums = AlbumSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->where('status','=','1')->get();

        

        return view('vendor.song.create',compact('category','song','albums'));


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 1;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
         
           $validator = Validator::make($request->all(), [
           'song'  =>  'max:13312',
           'song_pre'  =>  'max:3072',
              ]);

           if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
       
          $song1 = new AutorSong();
           // dd($request);
           $song1->category_id = $request->category_id;
          $song1->title = $request->title;
          $song1->description = $request->description;
          $song1->autor_id = Auth::guard('vendor')->user()->id;

           $countory = Vendor::where('id','=',Auth::guard('vendor')->user()->id)->first();
           
           $song1->countory_id = $countory->countory_id;
          
             $song1->album_id = $request->album_id;

  
         if ($request->hasfile('song')) {
            $audio1 = $request->file('song');
            $name = time() . 'song' . '.' . $audio1->getClientOriginalExtension();
            $destinationPath = 'song/';
            $audio1->move($destinationPath, $name);
            $song1->song = 'song/' . $name;
        }
         if ($request->hasfile('song_pre')) {
            $audio1 = $request->file('song_pre');
            $name = time() . 'song_pre' . '.' . $audio1->getClientOriginalExtension();
            $destinationPath = 'song_pre/';
            $audio1->move($destinationPath, $name);
            $song1->song_pre = 'song_pre/' . $name;
        }
         if ($request->hasfile('img')) {
            $image1 = $request->file('img');
            $name = time() . 'img' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'image/songcover/';
            $image1->move($destinationPath, $name);
            $song1->img = 'image/songcover/' . $name;
        }

       if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/image/', $name);  
                $data[] = $name;  
            }
         }
           $song1->filename=json_encode($data);
                    
              
        

          $category = Song::all();
         $song =  AutorSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->get();
        $albums = AlbumSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->get();
          $song1->save();
        return view('vendor.song.create',compact('category','song','albums'));
          toastr()->success('Added Song ');



       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $song = AutorSong::findOrFail($id);
        
        return view('vendor.song.show',compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       

        $category = Song::all();
         $song =  AutorSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->where('id','=',$id)->first();
        $albums = AlbumSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->get();
       // dd($albums);

         // return response()->json($song);
        return view('vendor.song.edit', compact('song','category','albums'));
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


           $song1 =  AutorSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->where('id','=',$id)->first();
           // dd($request);
           $song1->category_id = $request->category_id;
          $song1->title = $request->title;
          $song1->description = $request->description;
          $song1->autor_id = Auth::guard('vendor')->user()->id;
         $countory = Vendor::where('id','=',Auth::guard('vendor')->user()->id)->first();
           
           $song1->countory_id = $countory->countory_id;
          $song1->album_id = $request->album_id;

              if ($request->hasfile('img')) {
            $image1 = $request->file('img');
            $name = time() . 'img' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'image/songcover/';
            $image1->move($destinationPath, $name);
            $song1->img = 'image/songcover/' . $name;
        }
         

       if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/image/', $name);  
                $data[] = $name;  
            }
         }
           $song1->filename=json_encode($data);
                    
              
        

          $category = Song::all();
         $song =  AutorSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->get();
        $albums = AlbumSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->get();
          $song1->save();
        return view('vendor.song.create',compact('category','song','albums'));
          toastr()->success('Update Song ');



       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $autor =AutorSong::find($id);
       $autor->delete();
        toastr()->error('Delete Song ');
         return back();
    }
}
