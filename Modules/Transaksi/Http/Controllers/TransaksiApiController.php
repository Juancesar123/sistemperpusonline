<?php

namespace Modules\Transaksi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Transaksi\Entities\TransaksiModel;
use Illuminate\Support\Facades\DB;
class TransaksiApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $datatransaksi = DB::table('transaksi_pinjaman')
            ->join('buku', 'buku.id_buku', '=', 'transaksi_pinjaman.id_buku')
            ->join('siswa', 'siswa.id_siswa', '=', 'transaksi_pinjaman.id_siswa')
            ->whereNull('deleted_at')
            ->select('transaksi_pinjaman.*', 'buku.judul', 'buku.kode','siswa.nama_siswa')
            ->get();
        return $datatransaksi;
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('transaksi::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $transaksiObject = new TransaksiModel();
        $transaksiObject->id_siswa = $request->nama_siswa;
        $transaksiObject->tgl_pengembalian = $request->tgl_pengembalian;
        $transaksiObject->tgl_pinjaman = $request->tgl_pinjaman;
        $transaksiObject->id_buku = $request->kode_buku;
        $transaksiObject->status = 1;
        $transaksiObject->kd_transaksi = 'T'.rand(10,100);
        $transaksiObject->save();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('transaksi::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('transaksi::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $transaksiObject = TransaksiModel::find($id);
        $transaksiObject->delete();
    }
    public function changeStatus($id){
        $transaksiObject = TransaksiModel::find($id);
        $transaksiObject->status = '3';
        $transaksiObject->save();
    }
}
