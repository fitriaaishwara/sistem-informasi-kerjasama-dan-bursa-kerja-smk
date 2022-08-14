<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;
use App\Siswa;
use App\Rayon;
use App\Instansi;
use App\statusDetail;
use App\Jurusan;
use App\Preset;
use Illuminate\Support\Facades\Auth;
class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

    }

    public function index()
    {
        $jurusan = Jurusan::all();
        $status = Status::all();
        $company = Instansi::orderby('nama','asc')->where('nama','!=',null)->get();
        $rayon = Rayon::orderby('rayon','asc')->get();
        $preset = Preset::where('status','active')->first();
        // end chart jejak alumni
        if(Auth::user()->role != 'admin'){
            switch (Auth::user()->data->status_id) {
                case 1:
                    $formNon = ['Nama Instansi','Divisi','Durasi Kontrak Kerja','Pendapatan Bulanan','Alamat Instansi'];
                    break;

                case 2:
<<<<<<< HEAD
                    $formNon = ['Nama Universitas','Jurusan','Tingkatan','Pendapatan Bulanan','Alamat'];
=======
                    $formNon = ['Nama Universitas','Jurusan','Tingkatan','-','Alamat'];
>>>>>>> c5fb025c1af037852778008bbda1c310a2adf6fb
                    break;
                case 3:
                    $formNon = ['Nama Usaha','Jenis Usaha','Lama Berdiri','Pendapatan Bulanan','Alamat Usaha'];
                    break;
                default:
                    $formNon = ['Nama Instansi','Divisi','Durasi Kontrak Kerja','Pendapatan Bulanan','Alamat Instansi'];
                    break;
            }
        }else{

            $formNon = 'admin';
        }
        return view('user.editstatus',compact('jurusan','status','company','preset','rayon','formNon'));
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
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        statusDetail::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
