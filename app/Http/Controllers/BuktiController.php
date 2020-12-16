<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Laporan;
use  App\Models\Bukti;
use Validator;

class BuktiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $laporan = Laporan::where([['tanggal',date('y-m-d')],['id_CS',Auth::id()]])
        //                     ->orderBy('id')
        //                     ->Paginate(12);
        // // return $laporan;
        // return view("CS.dashboard")->with('laporan',$laporan);
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
        
        $laporan = Laporan::find($request->id);
        $this->validate($request,[
            'bukti' =>'required|max:10000|mimes:png,jpeg,jpg,bmp,svg,mov,mp4,avi,wmv'
        ]);
        if($request->hasFile('bukti')){
            $file =  $request->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = $laporan->id."_".date("Ymd")."_".($laporan->bukti->max('id')+1).".".$extension;
            $path = $file->storeAs('public/bukti',$filename);
            $bukti = new Bukti;
            $bukti->bukti = $filename;
            $bukti->id_laporan = $laporan->id;
            $laporan->status = 1;
            $laporan->save();
            $bukti->save();
        }
        
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        
        $bukti = Bukti::find($id);
        $laporan = $bukti->laporan;
        
        if(count($laporan->bukti)>1){
            $laporan->status = 1;
            $laporan->save();
        }else{
            $laporan->status = 0;
            $laporan->save();
        }
        $bukti->delete();
        return back();
    }

    
}
