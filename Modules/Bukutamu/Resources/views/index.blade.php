@extends('apps.layout')
@section('sectionheader')
<section class="content-header">
        <h1>
          Buku Tamu
          <small>List Buku Tamu</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-database"></i> Master Data</a></li>
          <li class="active">Data Buku Tamu</li>
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
                    <h4 class="modal-title">Form Input Data Buku Tamu</h4>
                    </div>
                    <form id="formbukutamu">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Siswa </label>
                                <select class="form-control" name="nama_siswa" id="nama_siswa">
                                    @foreach ($siswadata as $item)
                                        <option value="{{$item->id_siswa}}">{{$item->nis}} - {{$item->nama_siswa}}</option>
                                    @endforeach
                                </select>
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
                    <h4 class="modal-title">Form Ubah Data Buku Tamu</h4>
                    </div>
                    <form id="formbukutamuedit">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Siswa </label>
                                <select class="form-control" name="nama_siswaedit" id="nama_siswaedit">
                                    @foreach ($siswadata as $item)
                                        <option value="{{$item->id_siswa}}">{{$item->nis}} - {{$item->nama_siswa}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" id="idbukutamu">
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
            <table class="table" id="myTable" style="width:100%">
                <thead>
                    <th>Nama Siswa</th>
                    <th>Tanggal Kehadiran</th>
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
                            url:'/api/bukutamu/'+id,
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
                url:'/api/bukutamu/'+id,
                type:'GET',
                success:function(data){
                    console.log(data);
                    $( '#nama_siswaedit' ).val(data.id_siswa);
                    $( '#idbukutamu' ).val(data.id_bukutamu);
                }
            })
        }
        var table =  $('#myTable').DataTable({
                        deferRender: true,
                        ajax: {
                            url: "/api/bukutamu",
                            type: "GET",
                            dataSrc: function (d) {
                                return d
                            }
                        },
                        columns: [
                            { data: 'nama_siswa' },
                            { data: 'created_at' },
                            {
                                data: null,
                                render: function ( data, type, row ) {
                                    return "<button class='btn btn-primary' data-toggle='modal' data-target='#modals2'onclick='editfunc("+data.id_bukutamu+")'>Edit</button> <button class='btn btn-danger' onclick='myfunc("+data.id_bukutamu+")'>Delete</button>";
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
    $('#nama_siswaedit').select2({
        placeholder: 'Pilih Nama Siswa',
        allowClear: true,
        theme: "bootstrap"
    });
    $('form[id="formbukutamu"]').validate({
        rules: {
            nama_siswa: 'required',
        },
        messages: {
            judul: 'This field is required',

        },
        submitHandler: function(form) {
            var data;
            data = new FormData();
            data.append( 'nama_siswa', $( '#nama_siswa' ).val());
            $.ajax({
                url:'/api/bukutamu',
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
                            $('#myModal').modal('toggle');
                        })
                        table.ajax.reload();
                }
            })
        }
    });
    $('form[id="formbukutamuedit"]').validate({
        rules: {
            nama_siswaedit: 'required',
        },
        messages: {
            judul: 'This field is required',

        },
        submitHandler: function(form) {
            var id = $('#idbukutamu').val();
            var data;
            data = new FormData();
            data.append('_method', 'PUT');
            data.append( 'nama_siswa', $( '#nama_siswaedit' ).val());
            
            $.ajax({
                url:'/api/bukutamu/'+id,
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
                            $( '#nama_siswaedit' ).val('');
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
