@extends('layouts.header')
@section('infolowongan','m-menu__item--active')
@section('title','SIMBKK | Input Info Lowongan')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

  <div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!--Begin::Section-->
    <br>
    <div class="container">
      <div class="row">
      <div class="col-xl-12 mb-4">
          <a href="/infolowongan"><div class="btn {{$preset->buttonClass}}" >Kembali</div></a>
        </div>

        <div class="col-xl-12">
          <div class="m-portlet m-portlet--mobile ">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Info Lowongan
                  </h3>
                </div>
              </div>
            </div>

            <div class="m-portlet__body">

            <form method="post" action="/inputinfolowongan/store" enctype="multipart/form-data" class="form-horizontal">
            
              {{ csrf_field() }}
              <div class="form-group m-form__group row">
                <input type="hidden" name="id" id="id" class="form-control m-input">
                <h5><label id="judul" class="form-control-label col-lg-3 mt-4">Judul</label></h5>
                <div class="col-lg-12">
                  <input type="text" name="judul" required id="judul" class="form-control m-input">
                </div>

                <h5><label class="form-control-label col-lg-3 mt-4">Instansi</label></h5>
                <div class="col-lg-12">
                  <select name="instansi_id" id="instansi_id" class="form-control">
                    <option disabled selected style="display: none">-----Pilih Instansi-----</option>
                  @foreach ($instansi as $item)
                    <option value="{{ $item -> id }}">{{ $item -> nama }}</option>
                  @endforeach
                  </select>
                </div>

                <h5><label id="isi" class="form-control-label col-lg-3 mt-4">Isi</label></h5>
                <div class="col-lg-12">
                  <textarea name="isi" id="isi" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <h5><label id="foto" class="form-control-label col-lg-3 mt-4">Foto</label></h5>
                <div class="col-lg-12 mt-2 mb-4">
                  <img id="previewHolder" alt=" Preview" width="150px" height="150px"/>
                </div>
                <div class="col-lg-12">
                  <input type="file" name="foto" id="filePhoto" class="form-control m-input">
                </div>

                <h5><label id="expired" class="form-control-label col-lg-12 mt-4">Expired Date</label></h5>
                <div class="col-lg-12">
                  <input type="date" name="expired" required id="expired" class="form-control m-input">
                </div>

                <div class="col-lg-12 mt-4">
                  <button type="input" class="btn {{$preset->buttonClass}}">Simpan Data</button>
                </div>
              </div>

            </form>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!--End::Section-->
    </div>
  </div>
</div>

<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#previewHolder').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#filePhoto").change(function() {
  readURL(this);
});
</script>
@include('layouts.footer')
@endsection
