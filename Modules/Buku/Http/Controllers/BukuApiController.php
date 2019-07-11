<?php

namespace Modules\Buku\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Buku\Entities\BukuModel;
class BukuApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $databuku = DB::table('buku')
            ->join('klasifikasi', 'klasifikasi.id_klasifikasi', '=', 'buku.id_klasifikasi')
            ->select('buku.*', 'klasifikasi.nama')
            ->get();
            return $databuku;
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('buku::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $bukuObjet = new BukuModel();
        $bukuObjet->judul = $request->judul;
        $bukuObjet->penerbit = $request->penerbit;
        $bukuObjet->terbit = $request->terbit;
        $bukuObjet->pengarang = $request->pengarang;
        $bukuObjet->deskripsi = $request->deskripsi;
        $bukuObjet->kode = $request->kode;
        $bukuObjet->sampul = $request->sampul;
        $bukuObjet->isbn = $request->isbn;
        $bukuObjet->jumlah = $request->jumlah;
        $bukuObjet->id_klasifikasi = $request->klasifikasi;
        $bukuObjet->save();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $bukuObjet = BukuModel::find($id);
        return $bukuObjet;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('buku::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $bukuObjet = BukuModel::find($id);
        $bukuObjet->judul = $request->judul;
        $bukuObjet->penerbit = $request->penerbit;
        $bukuObjet->terbit = $request->terbit;
        $bukuObjet->pengarang = $request->pengarang;
        $bukuObjet->deskripsi = $request->deskripsi;
        $bukuObjet->kode = $request->kode;
        $bukuObjet->sampul = $request->sampul;
        $bukuObjet->isbn = $request->isbn;
        $bukuObjet->jumlah = $request->jumlah;
        $bukuObjet->id_klasifikasi = $request->klasifikasi;
        $bukuObjet->save();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $bukuObjet = BukuModel::find($id);
        $bukuObjet->delete();
    }
}
