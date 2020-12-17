<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Laporan;

class RuanganController extends Controller
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
        $this->validate($request,[
            'nama_ruang' =>'required'
        ]);
        if(count(Ruangan::where('name',$request->nama_ruang)->get())>0){
            return back()->with('error',"Nama ruangan sudah ada");
        }
        $ruang = new Ruangan();
        $ruang->name = $request->nama_ruang;
        $ruang->save();
        $laporan = new Laporan();
        $laporan->id_cs = $request->id_cs;
        $laporan->tanggal = date("Y-m-d");
        $laporan->id_ruang = $ruang->id;
        $laporan->status = 0;
        $laporan->save();
        return back()->with('success',"Ruangan berhasil ditambahkan");
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
        $this->validate($request,[
            'nama_ruang' =>'required:unique:Ruangan'
        ]);
        
        $ruang = Ruangan::find($id);
        $laporan = $ruang->laporan->where("tanggal",date("Y-m-d"))->first();
        $ruang->name = $request->nama_ruang;
        $ruang->save();
        $laporan->id_cs = $request->id_cs;
        $laporan->save();
        return back()->with('success',"Ruangan berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ruangan = Ruangan::find($id);
        $ruangan->delete();
        
        return back()->with('success','ruangan berhasil dihapus');
    }
}
