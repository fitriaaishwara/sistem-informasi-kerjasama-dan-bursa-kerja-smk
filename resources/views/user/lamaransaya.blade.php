@extends('layouts.header')
@section('lamaransaya','m-menu__item--active')
@section('title','SIMBKK | Lamaran Saya')
@section('content')

<style>
.display{
    table-layout:fixed;
}

.isi{
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>

<meta name="csrf-token" content="{{ csrf_token() }}">

  <div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-subheader ">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="m-subheader__title ">Lamaran Saya</h3>
        </div>
      </div>
    </div>

    <!--Begin::Section-->
    <br>
    <div class="container">
      <div class="row">

        <div class="col-xl-12">
          <div class="m-portlet m-portlet--mobile ">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Lamaran Saya
                  </h3>
                </div>
              </div>

            </div>
            <div class="m-portlet__body">
              <!--begin: Datatable -->
              <table id="table" class="display">
                <thead>
                  <tr>
                    <th style="width:10px">No</th>
                    <th>Nama Lowongan</th>
                    <th>Instansi</th>
                    <th>Dokumen</th>
                    <th>Tanggal Lamaran</th>
                    <th>Status</th>

                  </tr>
                </thead>
                <tbody>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
<<<<<<< HEAD
=======

>>>>>>> c5fb025c1af037852778008bbda1c310a2adf6fb
                </tbody>
              </table>

              <!--end: Datatable -->
            </div>
          </div>
        </div>

      </div>
    </div>
      <!--End::Section-->
    </div>
  </div>
</div>

<script type="text/javascript">

  var table = $('#table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "json/lamaransaya",
    "order": [[ 1, 'asc' ]],
    columns: [
<<<<<<< HEAD
    { "data": null,"sortable": false,
    render: function (data, type, row, meta) {
      return meta.row + meta.settings._iDisplayStart + 1;
    }
=======
    { "data": null,"sortable": false, 
    render: function (data, type, row, meta) {
      return meta.row + meta.settings._iDisplayStart + 1;
    }  
>>>>>>> c5fb025c1af037852778008bbda1c310a2adf6fb
  },
  {data: 'judul'},
  {data: "nama",
  render: function (id) {
    return '<div class="nama">'+id+'</div>';
  },
},
  {data: "dokumen",
  render: function (id) {
<<<<<<< HEAD
    return '<a href="doc/'+id+'">'+id+'</a>';
=======
    return '<a href="dok/dokumen/'+id+'">'+id+'</a>';
>>>>>>> c5fb025c1af037852778008bbda1c310a2adf6fb
  },
},
  {data: 'created_at'},
  {data: "status",
  render: function (id, type, row) {
    return '<div class="status">'+id+'</div>';
  },
},
],
});

</script>

@include('layouts.footer')
@endsection

