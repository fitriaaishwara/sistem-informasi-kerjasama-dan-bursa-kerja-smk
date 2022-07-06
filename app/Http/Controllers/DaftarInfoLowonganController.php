<?php

namespace App\Http\Controllers;

use App\User;
use App\DataSiswa;
use App\Preset;
use App\Berkas;
use App\datalowongan;
use App\InfoLowongan;
use App\Instansi;
use App\detailberkas;
use App\Siswa;
use File;
use Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class DaftarInfoLowonganController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        InfoLowongan::where('expired','<=',\Carbon\Carbon::now()->format('Y-m-d'))->update(['status' => 'Expired']);
    }
    
    public function index(){
        $preset = preset::where('status','active')->first();
        $lowongans = datalowongan::where('status','Aktif')->orderBy('updated_at','desc')->get();
        return view('user.daftarinfoLowongan',compact('preset','lowongans'));
    }

    public function json()
    {   

    }

    // Loker detail
    public function detaillowongan($id)
    {
        $preset = preset::where('status','active')->first();
        $lowongans = datalowongan::where('id',$id)->get();
        return view('user.detailLowongan',compact('preset','lowongans'));
    }

    public function create()
    {
        $berkas = Berkas::with('users','siswas','datalowongans')->get();
        return view('user.detailLowongan',compact('berkas'));
    }

    public function detail($id)
    {

    }

    public function store(Request $request, $id)
    {   

        $berkas1 = Siswa::find($id)->get();
        $berkas2 = datalowongan::find($id)->get(); // it will return array of collections
        $data =  $berkas1->concat($berkas2);

        $path = public_path().'/doc/cv';
        File::makeDirectory($path, $mode = 0777, true, true);
        $file = $request->file('cv');
        $nama_file = $request->judul."_".$file->getClientOriginalName();
        $file->move($path,$nama_file);

        Berkas::create([
            'user_id' => auth::user()->id,
            'siswa_id' => $data->id,
            'lowongan_id' => $data->id,
            'cv' => $nama_file,

        ]);

        return redirect('user.detailLowongan');
    }

}
