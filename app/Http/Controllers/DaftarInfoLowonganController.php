<?php

namespace App\Http\Controllers;

use PDF;
use File;
<<<<<<< HEAD
use Response;
=======
>>>>>>> c5fb025c1af037852778008bbda1c310a2adf6fb
use Carbon;
use App\User;
use App\Preset;
use App\Berkas;
use DataTables;
use App\Instansi;
use App\DataSiswa;
use App\datalowongan;
use App\datalamaran;
use App\InfoLowongan;
use App\detailberkas;
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
        return Datatables::of(datalamaran::where('user_id',auth::user()->id)->get())->make(true);
    }

    public function active($id)
    {
        Berkas::where('id',$id)->update(['status' => 'Diterima']);
        return response()->json();
    }

    public function deactive($id)
    {
        Berkas::where('id',$id)->update(['status' => 'Tidak Diterima']);
        return response()->json();
    }

    // Loker detail
    public function detaillowongan($id)
<<<<<<< HEAD
    {

        $preset = preset::where('status','active')->first();
        $lowongans = datalowongan::where('id',$id)->get();

        return view('user.detailLowongan',compact('preset','lowongans'));
=======
    {   
        
        $preset = preset::where('status','active')->first();
        $lowongans = datalowongan::where('id',$id)->get();

        return view('user.detailLowongan',compact('preset','lowongans'));
    }

    public function lamaransaya()
    {   
        
        $preset = preset::where('status','active')->first();
        return view('user.lamaransaya',compact('preset'));
>>>>>>> c5fb025c1af037852778008bbda1c310a2adf6fb
    }
    

<<<<<<< HEAD
    public function lamaransaya()
    {

        $preset = preset::where('status','active')->first();
        return view('user.lamaransaya',compact('preset'));
    }


    public function create($id)
    {
        $preset = preset::where('status','active')->first();
        $lowongan = datalowongan::where('id',$id)->get();
        return view('user.inputLamaran',compact('preset','lowongan'));
    }

=======
    public function create($id)
    {
        $preset = preset::where('status','active')->first();
        $lowongan = datalowongan::where('id',$id)->get();
        return view('user.inputlamaran',compact('preset','lowongan'));
    }

>>>>>>> c5fb025c1af037852778008bbda1c310a2adf6fb
    public function store($id, Request $request)
    {
        $lowongan = datalowongan::find($id);
        $path = public_path().'/doc';
        File::makeDirectory($path, $mode = 0777, true, true);
        $file = $request->file('dokumen');
        $nama_file = $request->judul."_".$file->getClientOriginalName();
        $file->move($path,$nama_file);

        Berkas::create([
            'user_id' => auth::user()->id,
            'lowongan_id' => $lowongan->id,
            'judul' => $request->judul,
            'dokumen' => $nama_file,
            'status' => 'Menunggu'

        ]);

        return redirect('/lamaransaya');
    }

    public function destroy($id)
    {
        Berkas::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
    }

    public function download($id, request $request){

        $file = Berkas::findOrFail($id);
<<<<<<< HEAD
        // $path = public_path(). '/doc' . $file->dokumen;
        $path = public_path('/doc'. $file->dokumen. '.pdf');
        return Response::download($path);
=======
        $path = public_path(). '/doc' . $file->dokumen;
        return Response::download($path, '.pdf');
>>>>>>> c5fb025c1af037852778008bbda1c310a2adf6fb
    }

}
