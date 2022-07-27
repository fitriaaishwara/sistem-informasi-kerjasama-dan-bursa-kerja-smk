<?php

namespace App\Http\Controllers;

use File;
use App\Preset;
use DataTables;
use Berkas;
use App\datalamaran;
use App\datalowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataLamaranController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index()
    {
        $preset = preset::where('status','active')->first();
        return view('admin.datalamaran',compact('preset'));
    }

    public function json()
    {
        return Datatables::of(datalamaran::all())->make(true);
    }

    public function detail($id)
    {
        $lamaran = datalamaran::where('id',$id)->first();
        $idlamar = datalamaran::where('id',$id)->first()->id;
        $status = datalamaran::where('id',$idlamar)->first();
        $data = array($lamaran,$status);
        return response()->json($data);
    }

}
