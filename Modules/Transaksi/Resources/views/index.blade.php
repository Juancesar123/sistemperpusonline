@extends('apps.layout')
@section('sectionheader')
<section class="content-header">
        <h1>
          Transaksi
          <small>List Transaksi</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-database"></i> Transaksi</a></li>
          <li class="active">Transaksi Pinjam</li>
        </ol>
      </section>
@endsection
@section('content')
   <div class="box box-primary">
       <div class="box-header">
           <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Data</button>
       </div>
       <div class="box-body">
           <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Tambah Pinjaman</h4>
                    </div>
                    <form id="formtransaksi">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Siswa </label>
                                <select class="form-control" name="nama_siswa" id="nama_siswa">
                                    @foreach ($datasiswa as $item)
                                        <option value="{{$item->id_siswa}}">{{$item->nis}}-{{$item->nama_siswa}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kode Buku </label>
                                <select class="form-control" name="kode_buku" id="kode_buku">
                                    @foreach ($databuku as $item)
                                        <option value="{{$item->id_buku}}">{{$item->kode}}-{{$item->judul}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal pengembalian </label>
                                <input class="form-control" name="tgl_pengembalian" id="tgl_pengembalian" type="date">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Peminjaman</label>
                                <input class="form-control" name="tgl_pinjaman" id="tgl_pinjaman" type="date">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-send"></i> Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
                <table class="table" id="myTable">
                    <thead>
                        <th>Nama Siswa</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Tanggal Pinjaman</th>
                        <th>Kode Transaksi</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                </table>
            </div>
       </div>
@stop
@section('script')
<script>
    
    function myfunc(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url:'/api/transaksi/'+id,
                            type:'DELETE',
                            success:function(){
                                Swal.fire(
                                            'Sukses!',
                                            'Data Sukses di hapus!',
                                            'success'
                                        )
                                        table.ajax.reload();
                            }
                        })
                    }
                })
          
        }
        function changeStatus(id){
            $.ajax({
                    url:'/api/transaksi/changestatus/'+id,
                    method:'GET',
                    contentType: false,
                    processData:false,
                    success:function(){
                        Swal.fire(
                                'Sukses!',
                                'Data Sukses di Ubah!',
                                'success'
                            )
                            table.ajax.reload();
                    }
                })
        }
        var table =  $('#myTable').DataTable({
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
                            {
                                data: null,
                                render: function ( data, type, row ) {
                                    if(data.status == 2){
                                        return "<button class='btn btn-danger' onclick='myfunc("+data.id_transaksi+")'>Delete</button> <button class='btn btn-success' onclick='changeStatus("+data.id_transaksi+")'>Dikembalikan</button>";
                                    }else if(data.status == 1){
                                        return "<button class='btn btn-danger' onclick='myfunc("+data.id_transaksi+")'>Delete</button> <button class='btn btn-success' onclick='changeStatus("+data.id_transaksi+")'>Dikembalikan</button>";
                                    }else{
                                        return "<button class='btn btn-danger' onclick='myfunc("+data.id_transaksi+")'>Delete</button>";
                                    }
                                }
                            }
                        ]
                    });
$('document').ready(function(){
    $('#nama_siswa').select2({
        placeholder: 'Pilih Nama Siswa',
        allowClear: true,
        theme: "bootstrap"
    });
    $('#kode_buku').select2({
        placeholder: 'Pilih Kode Buku',
        allowClear: true,
        theme: "bootstrap"
    });
    $('form[id="formtransaksi"]').validate({
        rules: {
            nama_siswa: 'required',
            tgl_pengembalian: 'required',
            tgl_pinjaman: 'required',
            kode_buku: 'required',
        },
        messages: {
            judul: 'This field is required',

        },
        submitHandler: function(form) {
            var data;
            data = new FormData();
            
            data.append( 'nama_siswa', $( '#nama_siswa' ).val());
            data.append( 'tgl_pengembalian', $( '#tgl_pengembalian' ).val());
            data.append( 'tgl_pinjaman', $( '#tgl_pinjaman' ).val());
            data.append( 'kode_buku', $( '#kode_buku' ).val());
            $.ajax({
                url:'/api/transaksi',
                method:'POST',
                data:data,
                contentType: false,
                processData:false,
                success:function(){
                    Swal.fire(
                            'Sukses!',
                            'Data Sukses di simpan!',
                            'success'
                        ).then(function(){
                            $( '#nama_siswa' ).val('');
                            $( '#tgl_pengembalian' ).val('');
                            $( '#tgl_pinjaman' ).val('');
                            $( '#kode_buku' ).val('');
                            $('#myModal').modal('toggle');
                        })
                        table.ajax.reload();
                }
            })
        }
    });

})
</script>
@endsection
