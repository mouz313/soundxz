<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\AutorSong;
use App\Vendor;
use App\Countory;
use App\User;
use App\AlbumSong;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
           $vendor = Vendor::where('status','=','0')->get();
           $user = User::where('status','=','0')->get();
           $allalbum = AlbumSong::where('status','=','0')->get();
           $allsong = AutorSong::where('status','=','0')->get();
        return view('admin.index', compact('vendor','user','allalbum','allsong'));
    }
    public function status($status, $id){
        // dd($status,$id);

        
        AutorSong::find($id)->update(['status' => $status]);
        return redirect()->back();
        toastr()->success('AutorSong Status Update ');
    }
     public function autorsonglist()
    {
        $autor = AutorSong::where('status','=','1')->get();
        return view('admin.song.song_details', compact('autor'));
    }
     public function autorsonglist2()
    {
        $autor = AutorSong::where('status','=','0')->get();
        return view('admin.song.song_details', compact('autor'));
    }
    public function autorstatus($status, $id){
        // dd($status,$id);
        AutorSong::find($id)->update(['status' => $status]);
        return redirect()->back();
         toastr()->success('AutorSong Status Update ');
    }
}