@extends('apps.layout')
@section('sectionheader')
<section class="content-header">
        <h1>
          Data Siswa
          <small>List Siswa</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-database"></i> Master Data</a></li>
          <li class="active">Data Siswa</li>
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
                    <h4 class="modal-title">Form Input Data Siswa</h4>
                    </div>
                    <form id="formsiswa">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Siswa </label>
                                <input class="form-control" name="nama" id="nama">
                            </div>
                            <div class="form-group">
                                    <label>Nis </label>
                                    <input class="form-control" name="nis" id="nis">
                                </div>
                            <div class="form-group">
                                <label>Alamat </label>
                                <textarea class="form-control" name="alamat" id="alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon </label>
                                <input class="form-control" name="nomortelepon" id="nomortelepon">
                            </div>
                            <div class="form-group">
                                <label>Email </label>
                                <input class="form-control" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin </label>
                                <select class="form-control" name="jeniskelamin" id="jeniskelamin">
                                    <option value="1">Laki-Laki</option>
                                    <option value="2">Perempuan</option>
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
                    <h4 class="modal-title">Form Ubah Data Siswa</h4>
                    </div>
                    <form id="formklasifikasiedit">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Siswa </label>
                                <input class="form-control" name="namaedit" id="namaedit">
                                <input type="hidden" id="idsiswa">
                            </div>
                            <div class="form-group">
                                    <label>Nis </label>
                                    <input class="form-control" name="nisedit" id="nisedit">
                                </div>
                            <div class="form-group">
                                <label>Alamat </label>
                                <textarea class="form-control" name="alamatedit" id="alamatedit"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon </label>
                                <input class="form-control" name="nomorteleponedit" id="nomorteleponedit">
                            </div>
                            <div class="form-group">
                                <label>Email </label>
                                <input class="form-control" name="emailedit" id="emailedit">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin </label>
                                <select class="form-control" name="jeniskelaminedit" id="jeniskelaminedit">
                                    <option value="1">Laki-Laki</option>
                                    <option value="2">Perempuan</option>
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
            <table class="table" id="myTable">
                <thead>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
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
                            url:'/api/siswa/'+id,
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
                url:'/api/siswa/'+id,
                type:'GET',
                success:function(data){
                    console.log(data);
                    $( '#namaedit' ).val(data.nama_siswa);
                    $( '#alamatedit' ).val(data.alamat);
                    $( '#nomorteleponedit' ).val(data.nomor_telepon);
                    $( '#emailedit' ).val(data.email);
                    $( '#nisedit' ).val(data.nis);
                    $( '#idsiswa' ).val(data.id_siswa);
                }
            })
        }
        var table =  $('#myTable').DataTable({
                        deferRender: true,
                        ajax: {
                            url: "/api/siswa",
                            type: "GET",
                            dataSrc: function (d) {
                                return d
                            }
                        },
                        columns: [
                            { data: 'nis' },
                            { data: 'nama_siswa' },
                            { data: 'alamat' },
                            { data: 'nomor_telepon' },
                            { data: 'email' },
                            {
                                data: null,
                                render: function ( data, type, row ) {
                                    if(data.jenis_kelamin == '1'){
                                        return "Laki-Laki";
                                    }else{
                                        return "Perempuan";
                                    }
                                }
                            },
                            {
                                data: null,
                                render: function ( data, type, row ) {
                                    return "<button class='btn btn-primary' data-toggle='modal' data-target='#modals2'onclick='editfunc("+data.id_siswa+")'>Edit</button> <button class='btn btn-danger' onclick='myfunc("+data.id_siswa+")'>Delete</button>";
                                }
                            }
                        ]
                    });
$('document').ready(function(){

        $('form[id="formsiswa"]').validate({
            rules: {
                nama: 'required',
                nis: 'required',
                jeniskelamin: 'required',
                alamat: 'required',
                nomortelepon: 'required',
                email: 'required',
            },
            messages: {
                judul: 'This field is required',

            },
            submitHandler: function(form) {
                var data;
                data = new FormData();
                data.append( 'nama', $( '#nama' ).val());
                data.append( 'alamat', $( '#alamat' ).val());
                data.append( 'nomortelepon', $( '#nomortelepon' ).val());
                data.append( 'email', $( '#email' ).val());
                data.append( 'jeniskelamin', $( '#jeniskelamin' ).val());
                data.append( 'nis', $( '#nis' ).val());
                $.ajax({
                    url:'/api/siswa',
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
                alamatedit: 'required',
                nomorteleponedit: 'required',
                emailedit: 'required',
                jeniskelaminedit: 'required',
                nisedit: 'required',
            },
            messages: {
                judul: 'This field is required',

            },
            submitHandler: function(form) {
                var id = $('#idsiswa').val();
                var data;
                data = new FormData();
                data.append('_method', 'PUT');
                data.append( 'nama', $( '#namaedit' ).val());
                data.append( 'alamat', $( '#alamatedit' ).val());
                data.append( 'nomortelepon', $( '#nomorteleponedit' ).val());
                data.append( 'email', $( '#emailedit' ).val());
                data.append( 'jeniskelamin', $( '#jeniskelaminedit' ).val());
                data.append( 'nis', $( '#nisedit' ).val());
                $.ajax({
                    url:'/api/siswa/'+id,
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
                                $( '#alamatedit' ).val('');
                                $( '#nomorteleponedit' ).val();
                                $( '#emailedit' ).val();
                                $( '#jeniskelaminedit' ).val();
                                $( '#nisedit' ).val();
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
