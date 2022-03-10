<?php

namespace App\Http\Controllers\Users\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AlbumSong;
use App\AutorSong;
use Auth;

class AlbumSongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $album =  AlbumSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->where('status','=','0')->get();

        return view('vendor.song.album',compact('album'));
    }
     public function index2()
    {
         $album =  AlbumSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->where('status','=','1')->get();

        return view('vendor.song.album',compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
         $album =  AutorSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->where('album_id','=', $id)->get();



        return view('vendor.song.singlealbumsong',compact('album'));
        
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $album = new AlbumSong();

            $album->title = $request->title;
           $album->autor_id = Auth::guard('vendor')->user()->id;

            if ($request->hasfile('image')) {
            $image1 = $request->file('image');
            $name = time() . 'image' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'image/album/';
            $image1->move($destinationPath, $name);
            $album->image = 'image/album/' . $name;
        }

         $album->save();
         toastr()->success('Added Album ');
           return back();
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

    public function albumreportadmin()
    {
           $album =  AlbumSong::where('status','=','0')->get();

        return view('admin.song.albumdetails',compact('album'));
    }
    public function albumreportadmin2()
    {
           $album =  AlbumSong::where('status','=','1')->get();

        return view('admin.song.albumdetails',compact('album'));
    }
     public function adminsinglealbum($id,$autor_id)
    {


         $album =  AutorSong::where('autor_id','=',$autor_id)->where('album_id','=', $id)->get();
        // dd($album);


        return view('admin.song.singlealbumsong',compact('album'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        $album =AlbumSong::find($id);
        return view('vendor.song.albumedit',compact('album'));
        
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
        $album =AlbumSong::find($id);

            $album->title = $request->title;
           $album->autor_id = Auth::guard('vendor')->user()->id;

            if ($request->hasfile('image')) {
            $image1 = $request->file('image');
            $name = time() . 'image' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'image/album/';
            $image1->move($destinationPath, $name);
            $album->image = 'image/album/' . $name;
        }

         $album->save();
         toastr()->success('Update Album ');
         
        $album =  AlbumSong::where('autor_id','=',Auth::guard('vendor')->user()->id)->get();
         return view('vendor.song.album',compact('album'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   
    public function destroy($id)
    {
        $album =AlbumSong::find($id);
        $song =AutorSong::where('album_id','=',$id);
         $song->delete();
       $album->delete();
        toastr()->error('Delete Album ');
         return back();
    }
     public function status($status, $id){
        // dd($status,$id);

        
        AlbumSong::find($id)->update(['status' => $status]);
        return redirect()->back();
        toastr()->success('ALbum Status Update ');
    }
    
    public function almumstatus($status, $id){
        // dd($status,$id);
        AlbumSong::find($id)->update(['status' => $status]);
        return redirect()->back();
         toastr()->success('ALbum Status Update ');
    }
}
