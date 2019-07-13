<?php

namespace Modules\Siswa\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Siswa\Entities\SiswaModel;
class SiswaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $datasiswa = DB::table('siswa')->get();
        return $datasiswa;
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('siswa::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $siswaObject = new SiswaModel();
        $siswaObject->nama_siswa = $request->nama;
        $siswaObject->alamat = $request->alamat;
        $siswaObject->nomor_telepon = $request->nomortelepon;
        $siswaObject->email = $request->email;
        $siswaObject->jenis_kelamin = $request->jeniskelamin;
        $siswaObject->nis = $request->nis;
        $siswaObject->save();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $siswaObject = SiswaModel::find($id);
        return $siswaObject;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('siswa::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $siswaObject = SiswaModel::find($id);
        $siswaObject->nama_siswa = $request->nama;
        $siswaObject->alamat = $request->alamat;
        $siswaObject->nomor_telepon = $request->nomortelepon;
        $siswaObject->email = $request->email;
        $siswaObject->jenis_kelamin = $request->jeniskelamin;
        $siswaObject->nis = $request->nis;
        $siswaObject->save();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $siswaObject = SiswaModel::find($id);
        $siswaObject->delete();
    }
}
