@extends('apps.layout')
@section('sectionheader')
<section class="content-header">
        <h1>
          Buku
          <small>List Klasifikasi</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-database"></i> Master Data</a></li>
          <li class="active">Buku</li>
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
                <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Input Buku</h4>
                    </div>
                    <form id="formbuku">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Judul </label>
                                        <input class="form-control" name="judul" id="judul">
                                    </div>
                                    <div class="form-group">
                                        <label>Penerbit </label>
                                        <input class="form-control" name="penerbit" id="penerbit">
                                    </div>
                                    <div class="form-group">
                                        <label>Terbit </label>
                                        <input class="form-control" name="terbit" id="terbit" type="date">
                                    </div>
                                    <div class="form-group">
                                        <label>Judul </label>
                                        <input class="form-control" name="judul" id="judul">
                                    </div>
                                    <div class="form-group">
                                        <label>Pengarang </label>
                                        <input class="form-control" name="pengarang" id="pengarang">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi </label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode </label>
                                        <input class="form-control" name="kode" id="kode">
                                    </div>
                                    <div class="form-group">
                                        <label>Sampul </label>
                                        <input class="form-control" name="sampul" id="sampul">
                                    </div>
                                    <div class="form-group">
                                        <label>ISBN </label>
                                        <input class="form-control" name="isbn" id="isbn">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah </label>
                                        <input class="form-control" name="jumlah" id="jumlah">
                                    </div>
                                    <div class="form-group">
                                        <label>Klasifikasi </label>
                                        <select class="form-control" name="klasifikasi" id="klasifikasi">
                                            @foreach ($klasifikasi as $item)
                                                
                                            <option value="{{$item->id_klasifikasi}}">{{$item->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
                <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Ubah Klasifikasi</h4>
                    </div>
                    <form id="formbukuedit">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Judul </label>
                                        <input class="form-control" name="juduledit" id="juduledit">
                                        <input type="hidden" id="idbuku">
                                    </div>
                                    <div class="form-group">
                                        <label>Penerbit </label>
                                        <input class="form-control" name="penerbitedit" id="penerbitedit">
                                    </div>
                                    <div class="form-group">
                                        <label>Terbit </label>
                                        <input class="form-control" name="terbitedit" id="terbitedit" type="date">
                                    </div>
                                    <div class="form-group">
                                        <label>Pengarang </label>
                                        <input class="form-control" name="pengarangedit" id="pengarangedit">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi </label>
                                        <textarea class="form-control" name="deskripsiedit" id="deskripsiedit"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode </label>
                                        <input class="form-control" name="kodeedit" id="kodeedit">
                                    </div>
                                    <div class="form-group">
                                        <label>Sampul </label>
                                        <input class="form-control" name="sampuledit" id="sampuledit">
                                    </div>
                                    <div class="form-group">
                                        <label>ISBN </label>
                                        <input class="form-control" name="isbnedit" id="isbnedit">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah </label>
                                        <input class="form-control" name="jumlahedit" id="jumlahedit">
                                    </div>
                                    <div class="form-group">
                                        <label>Klasifikasi </label>
                                        <select class="form-control" name="klasifikasiedit" id="klasifikasiedit">
                                            @foreach ($klasifikasi as $item)
                                                
                                            <option value="{{$item->id_klasifikasi}}">{{$item->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
                    <th>Judul</th>
                    <th>Penerbit</th>
                    <th>Terbit</th>
                    <th>Pengarang</th>
                    <th>Kode</th>
                    <th>Sampul</th>
                    <th>ISBN</th>
                    <th>Jumlah</th>
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
                            url:'/api/buku/'+id,
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
                url:'/api/buku/'+id,
                type:'GET',
                success:function(data){
                    console.log(data);
                    $( '#juduledit' ).val(data.judul);
                    $( '#penerbitedit' ).val(data.penerbit);
                    $( '#terbitedit' ).val(data.terbit);
                    $( '#pengarangedit' ).val(data.pengarang);
                    $( '#deskripsiedit' ).val(data.deskripsi);
                    $( '#kodeedit' ).val(data.kode);
                    $( '#sampuledit' ).val(data.sampul);
                    $( '#isbnedit' ).val(data.isbn);
                    $( '#jumlahedit' ).val(data.jumlah);
                    $( '#klasifikasiedit' ).val(data.id_klasifikasi);
                    $( '#idbuku' ).val(data.id_buku);
                }
            })
        }
        var table =  $('#myTable').DataTable({
                        deferRender: true,
                        ajax: {
                            url: "/api/buku",
                            type: "GET",
                            dataSrc: function (d) {
                                return d
                            }
                        },
                        columns: [
                            { data: 'judul' },
                            { data: 'penerbit' },
                            { data: 'terbit' },
                            { data: 'pengarang' },
                            { data: 'kode' },
                            { data: 'sampul' },
                            { data: 'isbn' },
                            { data: 'jumlah' },
                            {
                                data: null,
                                render: function ( data, type, row ) {
                                    return "<button class='btn btn-primary' data-toggle='modal' data-target='#modals2'onclick='editfunc("+data.id_buku+")'>Edit</button> <button class='btn btn-danger' onclick='myfunc("+data.id_buku+")'>Delete</button>";
                                }
                            }
                        ]
                    });
$('document').ready(function(){

        $('form[id="formbuku"]').validate({
            rules: {
                judul: 'required',
                penerbit: 'required',
                terbit: 'required',
                pengarang: 'required',
                deskripsi: 'required',
                kode: 'required',
                sampul: 'required',
                isbn: 'required',
                jumlah: 'required',
                klasifikasi: 'required',

            },
            messages: {
                judul: 'This field is required',

            },
            submitHandler: function(form) {
                var data;
                data = new FormData();
                
                data.append( 'judul', $( '#judul' ).val());
                data.append( 'penerbit', $( '#penerbit' ).val());
                data.append( 'terbit', $( '#terbit' ).val());
                data.append( 'pengarang', $( '#pengarang' ).val());
                data.append( 'deskripsi', $( '#deskripsi' ).val());
                data.append( 'kode', $( '#kode' ).val());
                data.append( 'sampul', $( '#sampul' ).val());
                data.append( 'isbn', $( '#isbn' ).val());
                data.append( 'jumlah', $( '#jumlah' ).val());
                data.append( 'klasifikasi', $( '#klasifikasi' ).val());
                $.ajax({
                    url:'/api/buku',
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
                                $( '#judul' ).val('');
                                $( '#penerbit' ).val('');
                                $( '#terbit' ).val('');
                                $( '#pengarang' ).val('');
                                $( '#deskripsi' ).val('');
                                $( '#kode' ).val('');
                                $( '#sampul' ).val('');
                                $( '#isbn' ).val('');
                                $( '#jumlah' ).val('');
                                $( '#klasifikasi' ).val('');
                                $('#myModal').modal('toggle');
                            })
                            table.ajax.reload();
                    }
                })
            }
        });
        $('form[id="formbukuedit"]').validate({
            rules: {
                juduledit: 'required',
                penerbitedit: 'required',
                terbitedit: 'required',
                pengarangedit: 'required',
                deskripsiedit: 'required',
                kodeedit: 'required',
                sampuledit: 'required',
                isbnedit: 'required',
                jumlahedit: 'required',
                klasifikasiedit: 'required',

            },
            messages: {
                judul: 'This field is required',

            },
            submitHandler: function(form) {
                var id = $('#idbuku').val();
                var data;
                data = new FormData();
                
                data.append('_method', 'PUT');
                data.append( 'judul', $( '#juduledit' ).val());
                data.append( 'penerbit', $( '#penerbitedit' ).val());
                data.append( 'terbit', $( '#terbitedit' ).val());
                data.append( 'pengarang', $( '#pengarangedit' ).val());
                data.append( 'deskripsi', $( '#deskripsiedit' ).val());
                data.append( 'kode', $( '#kodeedit' ).val());
                data.append( 'sampul', $( '#sampuledit' ).val());
                data.append( 'isbn', $( '#isbnedit' ).val());
                data.append( 'jumlah', $( '#jumlahedit' ).val());
                data.append( 'klasifikasi', $( '#klasifikasiedit' ).val());
                $.ajax({
                    url:'/api/buku/'+id,
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
                                $( '#juduledit' ).val('');
                                $( '#penerbitedit' ).val('');
                                $( '#terbitedit' ).val('');
                                $( '#pengarangedit' ).val('');
                                $( '#deskripsiedit' ).val('');
                                $( '#kodeedit' ).val('');
                                $( '#sampuledit' ).val('');
                                $( '#isbnedit' ).val('');
                                $( '#jumlahedit' ).val('');
                                $( '#klasifikasiedit' ).val('');
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
