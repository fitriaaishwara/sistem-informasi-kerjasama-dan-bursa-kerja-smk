@extends('layouts.header')
@section('daftarinfolowongan','m-menu__item--active')
@section('title','SIMBKK | Daftar Lowongan Kerja')
@section('content')

<style>
    * { box-sizing: border-box; }

.container { 
  display: flex; 
  flex-flow: row wrap;
}

.card-wrap {
  flex: 0 0 100%;
  display: flex;
  padding: 5px; /* gutter width */
}

.card {
  box-shadow: 0 0 4px rgba(0,0,0,0.4);
  flex: 0 0 100%;
  padding: 20px;
}
</style>

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="m-grid__item m-grid__item--fluid m-wrapper">
  <div class="m-subheader ">
    <div class="d-flex align-items-center">
      <div class="mr-auto">
        <h3 class="m-subheader__title ">Daftar Lowongan Kerja</h3>
      </div>
    </div>
  </div>
  <br>
  
  <div class="container">
    <div class="row">
        @foreach($lowongans as $dataL)
        <div class="col-lg-3 d-flex align-items-stretch mt-4 mb-3">
          <div class="card-wrap">
            <div class="card">
              <h5 class="card-title"><a href="/detaillowongan;{{$dataL->id}}">{{$dataL->judul}}</a></h5>
              <p class="card-text" style="text-align:justify;">{{$dataL->nama}}</p>
              <br>
              <a href="/detaillowongan;{{$dataL->id}}" class="btn btn-primary px-5" style="float: right;">Detail</a>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  </div>
  </div>
</div>
</div>
@include('layouts.footer')
@endsection

