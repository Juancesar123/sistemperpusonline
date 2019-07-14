@extends('apps.layout')
@section('sectionheader')
<section class="content-header">
        <h1>
          Reporting Transaksi
          <small>Reporting</small>
        </h1>
        <ol class="breadcrumb">
          <li class="active"><a href="#"><i class="fa fa-area-chart"></i> Reporting Transaksi</a></li>
        </ol>
      </section>
@endsection
@section('content')
   <div class="box box-primary">
       <div class="box-header">
       </div>
       <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Kode Transaksi </label>
                            <input class="form-control" id="kodetransaksi">
                        </div>
                        <button class="btn btn-primary" onclick="search()">Search</button>
                    </div>
                </div>
                <br>
                <br>
                <table class="table" id="myTable" style="width:100%">
                    <thead>
                        <th>Nama Siswa</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Tanggal Pinjaman</th>
                        <th>Kode Transaksi</th>
                        <th>Status</th>
                    </thead>
                </table>
            </div>
       </div>
@stop
@section('script')
<script>    
var table =  $('#myTable').DataTable({
                lengthChange: false,
                dom: 'Bfrtip',
                buttons: [
                    'print',
                    {
                        extend:    'pdfHtml5',
                        text:      '<i class="fa fa-file-pdf-o"></i> Download Pdf',
                        titleAttr: 'PDF'
                    },
                    {
                        extend:    'excelHtml5',
                        text:      '<i class="fa fa-file-excel-o"></i> Download Excel',
                        titleAttr: 'Excel'
                    },
                ],
                deferRender: true,
                ajax: {
                    url: "/api/transaksi",
                    type: "GET",
                    dataSrc: function (d) {
                        return d
                    }
                },
                columns: [
                    { data: 'nama_siswa' },
                    { data: 'judul' },
                    { data: 'tgl_pengembalian' },
                    { data: 'tgl_pinjaman' },
                    { data: 'kd_transaksi' },
                    {
                        data: null,
                        render: function ( data, type, row ) {
                            if(data.status == 1){
                                return "<span class='label label-warning'>Dipinjam</span>";
                            }else if(data.status == 2){
                                return "<span class='label label-danger'>Telat</span>";
                            }else if(data.status == 3){
                                return "<span class='label label-success'>Dikembalikan</span>";
                            }
                        }
                    },
                ]
            });
function search (){
    table.column(4).search($('#kodetransaksi').val()).draw();
    console.log($('#kodetransaksi').val());
}
$('document').ready(function(){
   
})
</script>
@endsection
