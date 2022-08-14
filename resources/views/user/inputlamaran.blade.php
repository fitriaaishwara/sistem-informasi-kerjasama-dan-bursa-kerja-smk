@extends('layouts.header')
@section('daftarinfolowongan','m-menu__item--active')
@section('title','SIMBKK | Lamar Pekerjaan')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <!-- <h3 class="m-subheader__title ">Input Portofolio</h3> -->
            </div>
        </div>
    </div>

      <div class="container">
    <div class="row">
      <div class="col-xl-12 mb-4">
        <a href="{{url('daftarinfolowongan')}}"><div class="btn {{$preset->buttonClass}}" >Kembali</div></a>
      </div>

      <div class="col-xl-12">
        <div class="m-portlet m-portlet--mobile ">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">Upload Dokumen</h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            @foreach ($lowongan as $item)
            <form  method="post" action="/inputlamaran/store/{{$item->id}}"  enctype="multipart/form-data" class="form-horizontal">
              {{ csrf_field() }}
              <div class="form-group m-form__group row">
                <input type="hidden" name="lowongan_id" id="id" class="form-control m-input" value="{{$item->id}}">
                <h5><label id="isi" class="form-control-label col-lg-3 mt-4">Nama Dokumen</label></h5>
                <div class="col-lg-12">
                  <input type="text" name="judul" required id="judul" class="form-control m-input">
                </div>

                <div class="col-lg-12">
                  <input type="file" name="dokumen" id="fileDok" class="form-control m-input">
                </div>

                <div class="col-lg-12 mt-4">
                  <button type="input" class="btn {{$preset->buttonClass}}">Save Data</button>
                </div>

              </div>
            </form>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End::Section-->

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

$("#fileDok").change(function() {
  readURL(this);
});
</script>

@include('layouts.footer')
@endsection