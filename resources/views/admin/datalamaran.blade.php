@extends('layouts.header')
@section('datalamaran','m-menu__item--active')
@section('title','SIMBKK | Daftar Lamaran')
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
          <h3 class="m-subheader__title ">Data Lamaran</h3>
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
                    Data Lamaran
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
                    <th>Nama</th>
                    <th>Perusahaan</th>
                    <th>Judul</th>
                    <th>Dokumen</th>
                    <th>Status</th>
                    <th style="width:180px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>

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

<!-- modaldetail -->
<div class="modal fade" id="modal-alumni-detail"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="max-width: 50% !important;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-alumniTitle">Detail Lamaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 mb-4">
              <div class="card">
                <div class="card-body">

                  <table class="table table-borderless">
                    <tr>
                      <td width="200px">Nama</td>
                      <td>:</td>
                      <td id="d_name"></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td id="d_email"></td>
                    </tr>
                    <tr>
                      <td>Telp</td>
                      <td>:</td>
                      <td id="d_telp"></td>
                    </tr>
                    <tr>
                      <td>Judul Lowongan</td>
                      <td>:</td>
                      <td id="d_judul"></td>
                    </tr>
                    <tr>
                      <td>Perusahaan</td>
                      <td>:</td>
                      <td id="d_nama"></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td>:</td>
                      <td id="d_status"></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lamar</td>
                      <td>:</td>
                      <td id="d_dibuat"></td>
                    </tr>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn {{$preset->buttonClass}}" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end -->

<script type="text/javascript">
  var table = $('#table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "json/datalamaran",
    "order": [[ 1, 'asc' ]],
    columns: [
    { "data": null,"sortable": false, 
    render: function (data, type, row, meta) {
      return meta.row + meta.settings._iDisplayStart + 1;
    }  
  },
  {data: 'name'},
  {data: 'nama'},
  {data: "judul",
  render: function (id) {
    return '<div class="judul">'+id+'</div>';
  },
},
  {data: "dokumen",
    "searchable": false,
    "sortable": false,
    render: function (id) {
      return '<img src="/doc'+id+'" alt="'+id+'" height="50" width="50">';
    },
  },
  {data: 'status'},
  {data: "id",
  "searchable": false,
  "sortable": false,
  render: function (id, type, full, meta) {
    return '<div class="btn-group"><a href="javascript:void(0)" data-toggle="tooltip" id="active"  data-id="'+id+'" class="btn btn-success btn-sm"><i class="fa fa-check" style="color:white;"></i></a><a href="javascript:void(0)" data-toggle="tooltip" id="deactive"  data-id="'+id+'" class="btn btn-danger btn-sm"><i class="fa fa-times" style="color:white;"></i></a>&nbsp&nbsp</div><div class="btn-group"><a href="javascript:void(0)" data-toggle="tooltip" id="detail" data-id="'+id+'" data-original-title="Detail" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>  <a href="javascript:void(0)" data-toggle="tooltip" id="delete"  data-id="'+id+'" data-original-title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
  },
},
],
});

$(document).on('click','#active',function(){
    var id = $(this).data("id");
    $.ajaxSetup({ 
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }   
    })

    $.ajax({
      data: {"id": id},
      url: "/datalamaran/active/"+id,
      type: "POST",
      dataType: 'json',
      success: function (data) {
        table.draw();
        swal({
          title: 'Diterima!',
          type: 'success',
          showConfirmButton: false,
          timer: 1500,
        })
      },
      error: function (data) {
        console.log('Error:', data);
      }
    });
  });

  $(document).on('click','#deactive',function(){
    var id = $(this).data("id");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })

    $.ajax({
      data: {"id": id},
      url: "/datalamaran/deactive/"+id,
      type: "POST",
      dataType: 'json',
      success: function (data) {
        table.draw();
        swal({
          title: 'Belum Diterima!',
          type: 'error',
          showConfirmButton: false,
          timer: 1500,
        })
      },
      error: function (data) {
        console.log('Error:', data);
      }
    });
  });

  $(document).on('click','#waited',function(){
    var id = $(this).data("id");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })

    $.ajax({
      data: {"id": id},
      url: "/datalamaran/waited/"+id,
      type: "POST",
      dataType: 'json',
      success: function (data) {
        table.draw();
        swal({
          title: 'Status Berhasil Diubah!',
          type: 'error',
          showConfirmButton: false,
          timer: 1500,
        })
      },
      error: function (data) {
        console.log('Error:', data);
      }
    });
  });

  $(document).on('click','#detail',function(){
    var id = $(this).data("id");
    $.get('datalamaran/detail/' + id , function (data) {
      $('#d_name').html(data[0].name);
      $('#d_email').html(data[0].email);
      $('#d_telp').html(data[0].email);
      $('#d_judul').html(data[0].judul);
      $('#d_nama').html(data[0].nama);
      $('#d_status').html(data[0].status);
      $('#d_dibuat').html(data[0].created_at);
      $('#modal-alumni-detail').modal('show');
    })
  });

  $(document).on('click','#delete',function(){
  swal({
  title: 'Apakah Anda yakin?',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Ya',
  cancelButtonText: 'Tidak'
}).then((result) => {
  if (result.value) {
    var id = $(this).data("id");
  var token = $("meta[name='csrf-token']").attr("content");
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
  $.ajax({
    type: "DELETE",
    url: "datalamaran/delete/"+id,
    data: {
      "id": id,
      "_token": token,
    },
    success: function (data) {
      table.draw();
      swal({
          title: 'Data Terhapus!',
          type: 'success',
          showConfirmButton: false,
          timer: 1500,
      })
    },
    error: function (data) {
      console.log('Error:', data);
    }
  });
  }
});
});
</script>
@include('layouts.footer')
@endsection
