<?php

namespace Modules\Klasifikasi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Klasifikasi\Entities\KlasifikasiModel;
class KlasifikasiApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $klasifikasidata = DB::table('klasifikasi')->get();
        return $klasifikasidata;
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('klasifikasi::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $klasifikasiobject = new KlasifikasiModel();
        $klasifikasiobject->nama = $request->nama;
        $klasifikasiobject->save();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $dataklasifikasi = KlasifikasiModel::find($id);
        return $dataklasifikasi;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('klasifikasi::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $klasifikasiobject = KlasifikasiModel::find($id);
        $klasifikasiobject->nama = $request->nama;
        $klasifikasiobject->save();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $klasifikasiobject = KlasifikasiModel::find($id);
        $klasifikasiobject->delete();
    }
}
