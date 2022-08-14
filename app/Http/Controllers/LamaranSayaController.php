<?php

namespace App\Http\Controllers;
use App\Preset;
use DataTables;
use App\datalamaran;
use App\datalowongan;
use App\Berkas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LamaranSayaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $preset = preset::where('status','active')->first();
        return view('user.lamaransaya',compact('preset'));
    }

    public function json()
    {
        return Datatables::of(datalamaran::where('user_id',auth::user()->id)->get())->make(true);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        //
    }

        public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {
        //
    }
}
