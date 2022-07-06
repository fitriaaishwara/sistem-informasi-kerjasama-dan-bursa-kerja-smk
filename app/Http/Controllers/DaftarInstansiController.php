<?php

namespace App\Http\Controllers;

use App\Instansi;
use App\Preset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftarInstansiController extends Controller
{
     public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $preset = preset::where('status','active')->first();
        $instansis = Instansi::where('nama','!=',null)->get();
        return view('user.daftarInstansi',compact('preset','instansis'));
    }

    public function detailinstansi($id)
    {
        $preset = preset::where('status','active')->first();
        $instansis = Instansi::where('id',$id)->get();
        return view('user.detailinstansi',compact('preset','instansis'));
    }
}
