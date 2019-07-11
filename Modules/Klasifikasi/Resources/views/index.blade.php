@extends('apps.layout')
@section('sectionheader')
<section class="content-header">
        <h1>
          Klasifikasi
          <small>List Klasifikasi</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-database"></i> Master Data</a></li>
          <li class="active">Category</li>
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
                    <h4 class="modal-title">Form Input Klasifikasi</h4>
                    </div>
                    <form id="formklasifikasi">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama </label>
                                <input class="form-control" name="nama" id="nama">
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
            <div id="modals2" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Ubah Klasifikasi</h4>
                    </div>
                    <form id="formklasifikasiedit">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama </label>
                                <input class="form-control" name="nama_kategoriedit" id="namaedit">
                                <input type="hidden" id="idklasifikasi">
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
                    <th>Nama</th>
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
                            url:'/api/klasifikasi/'+id,
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
        function editfunc(id){
            $.ajax({
                url:'/api/klasifikasi/'+id,
                type:'GET',
                success:function(data){
                    console.log(data);
                    $( '#namaedit' ).val(data.nama);
                    $( '#idklasifikasi' ).val(data.id_klasifikasi);
                }
            })
        }
        var table =  $('#myTable').DataTable({
                        deferRender: true,
                        ajax: {
                            url: "/api/klasifikasi",
                            type: "GET",
                            dataSrc: function (d) {
                                return d
                            }
                        },
                        columns: [
                            { data: 'nama' },
                            {
                                data: null,
                                render: function ( data, type, row ) {
                                    return "<button class='btn btn-primary' data-toggle='modal' data-target='#modals2'onclick='editfunc("+data.id_klasifikasi+")'>Edit</button> <button class='btn btn-danger' onclick='myfunc("+data.id_klasifikasi+")'>Delete</button>";
                                }
                            }
                        ]
                    });
$('document').ready(function(){

        $('form[id="formklasifikasi"]').validate({
            rules: {
                nama: 'required',
            },
            messages: {
                judul: 'This field is required',

            },
            submitHandler: function(form) {
                var data;
                data = new FormData();
                data.append( 'nama', $( '#nama' ).val());
                $.ajax({
                    url:'/api/klasifikasi',
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
                                $( '#nama' ).val('');
                                $('#myModal').modal('toggle');
                            })
                            table.ajax.reload();
                    }
                })
            }
        });
        $('form[id="formklasifikasiedit"]').validate({
            rules: {
                namaedit: 'required',
            },
            messages: {
                judul: 'This field is required',

            },
            submitHandler: function(form) {
                var id = $('#idklasifikasi').val();
                var data;
                data = new FormData();
                data.append('_method', 'PUT');
                data.append( 'nama', $( '#namaedit' ).val());
                $.ajax({
                    url:'/api/klasifikasi/'+id,
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
                                $( '#namaedit' ).val('');
                                $('#modals2').modal('toggle');
                            })
                            table.ajax.reload();
                    }
                })
            }
        });

})
</script>
@endsection
