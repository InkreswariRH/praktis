<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pasien::with('kelurahan.kecamatan.kota.provinsi')->orderBy('id', 'DESC')->get();
        return view('operator.pasien.index', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prefix = date("ym");
        $bulan = date('m');
        $id_pasien = Helper::IDGenerator(new Pasien, 'id_pasien', 6, $prefix, $bulan);
        $kelurahan = Kelurahan::all();
        return view('operator.pasien.create', compact('kelurahan', 'id_pasien'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pasien = new Pasien();
        $pasien->id_pasien = $request->id_pasien;
        $pasien->id_kelurahan = $request->id_kelurahan;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->alamat = $request->alamat;
        $pasien->telepon = $request->telepon;
        $pasien->rt = $request->rt;
        $pasien->rw = $request->rw;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->tanggal_lahir = $request->tanggal_lahir;

        $pasien->save();
        return redirect()->route('pasien.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('operator.pasien.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelurahan = Kelurahan::all();
        $pasien = Pasien::findOrFail($id);
        return view('operator.pasien.edit', compact('pasien', 'kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->id_pasien = $request->id_pasien;
        $pasien->id_kelurahan = $request->id_kelurahan;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->alamat = $request->alamat;
        $pasien->telepon = $request->telepon;
        $pasien->rt = $request->rt;
        $pasien->rw = $request->rw;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->tanggal_lahir = $request->tanggal_lahir;

        $pasien->save();
        return redirect()->route('pasien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        return redirect()->route('pasien.index');
    }
}
