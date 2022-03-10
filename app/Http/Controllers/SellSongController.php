<?php

namespace App\Http\Controllers;

use App\SellSong;
use Illuminate\Http\Request;

class SellSongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sell = SellSong::all();

        return view('admin.sellsong.index',compact('sell'));
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SellSong  $sellSong
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $sell_song = SellSong::findOrFail($id);

       return view('admin.sellsong.show',compact('sell_song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SellSong  $sellSong
     * @return \Illuminate\Http\Response
     */
    public function edit(SellSong $sellSong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SellSong  $sellSong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellSong $sellSong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SellSong  $sellSong
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellSong $sellSong)
    {
        //
    }
     public function sellDetails()
    {
        $sell_song = SellSong::all();

        return view('vendor.songlist.index', compact('sell_song'));
    }
}
