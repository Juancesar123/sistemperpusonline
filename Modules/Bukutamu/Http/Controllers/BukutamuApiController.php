<?php

namespace Modules\Bukutamu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Bukutamu\Entities\BukuTamuModel;
use Illuminate\Support\Facades\DB;
class BukutamuApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $users = DB::table('bukutamu')
            ->join('siswa', 'siswa.id_siswa', '=', 'bukutamu.id_siswa')
            ->select('bukutamu.*', 'siswa.nama_siswa', 'siswa.nis')
            ->get();
            return $users;
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $bukutamuObject = new BukuTamuModel();
        $bukutamuObject->id_siswa = $request->nama_siswa;
        $bukutamuObject->save();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $bukutamudata = BukuTamuModel::find($id);
        return $bukutamudata;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('bukutamu::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $bukutamuObject = BukuTamuModel::find($id);
        $bukutamuObject->id_siswa = $request->nama_siswa;
        $bukutamuObject->save();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $bukutamuObject = BukuTamuModel::find($id);
        $bukutamuObject->delete();
    }
}
