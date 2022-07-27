@extends('layouts.header')
@section('daftarinfolowongan','m-menu__item--active')
@section('title','SIMBKK | Edit Data dan Status')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container">
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <br>
            @foreach($lowongans as $dataL)
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <a href="#" style="font-size : medium"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{$dataL->judul}}
                            </a>
                        </h2>
                    </div>

                    <div class="col-lg-3 d-flex align-items-stretch mt-4 mb-3">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-xl-12 ">
                                    <div class="card-body">
                                        <div class="row no-gutters">
                                            <h5>{{$dataL->nama}}</h5>
                                            <br>
                                                <div class="post-meta">
                                                    <img src="{{ asset('image/InfoLowongan/'. $dataL->foto ) }}" width="100px" style="padding:10px 0 10px 0;">
                                                    <h6>Kriteria :</h6>
                                                    <p>{{$dataL->isi}}</p>
                                                    <h6>Batas Pendaftaran :</h6>
                                                    <p>{{$dataL->expired}}</p>
                                                </div>
                                                 <div class="col-xl-12 mb-4">
                                                    <a href="/inputlamaran/{{$dataL->id}}"><div class="btn {{$preset->buttonClass}}">Lamar</div></a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('layouts.footer')
@endsection