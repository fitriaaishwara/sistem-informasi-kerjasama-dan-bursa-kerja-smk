@extends('layouts.header')
@section('daftarinstansi','m-menu__item--active')
@section('title','SIMBKK | Edit Data dan Status')
@section('content')


<div class="container">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
    <br>
         @foreach($instansis as $dataI)
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <a href="#" style="font-size : medium"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{$dataI->nama}}
                        </a>
                    </h2>
                </div>

                <div class="col-lg-3 d-flex align-items-stretch mt-4 mb-3">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-xl-12 ">
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <h5>{{$dataI->nama}}</h5>
                                        <br>
                                        <br>
                                            <div class="post-meta">
                                                <h6>Alamat :</h6>
                                                <p>{{$dataI->kota}}, {{$dataI->alamat}}</p>
                                                <h6>No Telepon :</h6>
                                                <p>{{$dataI->telp}}</p>
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

@include('layouts.footer')
@endsection