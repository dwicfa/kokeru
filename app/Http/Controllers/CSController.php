<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  App\Models\Laporan;
use  App\Models\Bukti;
use  App\Models\CS;
use Illuminate\Support\Facades\Hash;
use Auth;

class CSController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(string $page)
    {
        switch ($page) {
            case 'dashboard':
                $laporan = Laporan::where([['tanggal',date('y-m-d')],['id_CS',Auth::id()]])
                                    ->orderBy('id')
                                    ->Paginate(12);
                // return $laporan;
                return view("CS.{$page}")->with('laporan',$laporan);
                break;
            case 'profile':
                $cs = CS::find(Auth::id());
                return view("CS.{$page}")->with('cs',$cs);
                break;
            default:
                return abort(404);
                break;
        }
       
    }
    
    public function getlaporan($id_laporan){
        $laporan = Laporan::find($id_laporan);
        return view('cs.upload')->with('laporan',$laporan);
    }
    public function getCS($id){
        $cs = CS::find($id);
        return view('managers.editCS')->with('cs',$cs);
    }
    public function tambahCS(){
        return view('managers.addCS');
    }
    

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'nama_cs' =>'required|string|max:255',
            'email' => ' required|unique:CS|email|max:255',
            'password' => 'required|min:8'
        ]);
        $cs = new CS();
        $cs->name = $request->nama_cs;
        $cs->email = $request->email;
        $cs->password = Hash::make($request->password);
        $cs->save();
        return back()->with('success',"CS berhasil ditambahkan");
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'nama_cs' =>'required|string|max:255',
            'email' => ' required|unique:CS'.($id ? ",id,$id" : '').'|email|max:255|',
            'password' => 'required|min:8'
        ]);
        $cs = CS::find($id);
        $cs->name = $request->nama_cs;
        $cs->email = $request->email;
        $cs->password = Hash::make($request->password);
        $cs->save();
        return back()->with('success',"Data CS berhasil diubah");
    }
    public function destroy($id)
    {
        $cs = CS::find($id);
        $cs->delete();
        
        return back()->with('success','data CS berhasil dihapus');
    }
}
