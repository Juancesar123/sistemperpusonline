@extends('apps.layout')
@section('sectionheader')
<section class="content-header">
        <h1>
          Denda
          <small>List Denda</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-database"></i> Transaksi</a></li>
          <li class="active">Denda</li>
        </ol>
      </section>
@endsection
@section('content')
   <div class="box box-primary">
       <div class="box-header">
       </div>
       <div class="box-body">
                <table class="table" id="myTable">
                    <thead>
                        <th>Nama Siswa</th>
                        <th>Judul Buku</th>
                        <th>Denda</th>
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
                            url:'/api/denda/'+id,
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
                    url:'/api/denda/changestatus/'+id,
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
                            url: "/api/denda",
                            type: "GET",
                            dataSrc: function (d) {
                                return d
                            }
                        },
                        columns: [
                            { data: 'nama_siswa' },
                            { data: 'judul' },
                            { data: 'denda' },
                            {
                                data: null,
                                render: function ( data, type, row ) {
                                    if(data.status == 1){
                                        return "<span class='label label-danger'>Belum Di bayar</span>";
                                    }else if(data.status == 2){
                                        return "<span class='label label-success'>Sudah Di bayar</span>";
                                    }
                                }
                            },
                            {
                                data: null,
                                render: function ( data, type, row ) {
                                    if(data.status == 1){
                                        return "<button class='btn btn-danger' onclick='myfunc("+data.id_denda+")'>Delete</button> <button class='btn btn-success' onclick='changeStatus("+data.id_denda+")'>Sudah Di bayar</button>";
                                    }else if(data.status == 2){
                                        return "<button class='btn btn-danger' onclick='myfunc("+data.id_denda+")'>Delete</button>";
                                    }
                                }
                            }
                        ]
                    });
$('document').ready(function(){
   
})
</script>
@endsection
