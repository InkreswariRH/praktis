<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Repositories\PasienInterface;

class PasienController extends Controller
{
    protected $pasien;
    public function __construct(PasienInterface $pasien)
    {
        $this->pasien = $pasien;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = $this->pasien->all();
        return view('operator.pasien.index', compact('pasien'));
        // $pasien = Pasien::with('kelurahan.kecamatan.kota.provinsi')->orderBy('id', 'DESC')->get();
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
        $id_pasien = $this->pasien->idGenerator(new Pasien, 'id_pasien', 6, $prefix, $bulan);
        $kelurahan = $this->pasien->forCreate();
        return view('operator.pasien.create', compact('kelurahan', 'id_pasien'));
        // $id_pasien = Helper::IDGenerator(new Pasien, 'id_pasien', 6, $prefix, $bulan);
        // $kelurahan = Kelurahan::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required',
            'id_kelurahan' => '',
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required'
        ]);
        $this->pasien->store($request->all());
        return redirect()->route('pasien.index')->with('success', 'Data Pasien Berhasil Ditambah');
        // $pasien = new Pasien();
        // $pasien->id_pasien = $request->id_pasien;
        // $pasien->id_kelurahan = $request->id_kelurahan;
        // $pasien->nama_pasien = $request->nama_pasien;
        // $pasien->alamat = $request->alamat;
        // $pasien->telepon = $request->telepon;
        // $pasien->rt = $request->rt;
        // $pasien->rw = $request->rw;
        // $pasien->jenis_kelamin = $request->jenis_kelamin;
        // $pasien->tanggal_lahir = $request->tanggal_lahir;

        // $pasien->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = $this->pasien->get($id);
        return view('operator.pasien.show', compact('pasien'));
        // $pasien = Pasien::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelurahan = $this->pasien->forCreate();
        $pasien = $this->pasien->get($id);
        return view('operator.pasien.edit', compact('pasien', 'kelurahan'));
        // $kelurahan = Kelurahan::all();
        // $pasien = Pasien::findOrFail($id);
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
        $request->validate([
            'id_pasien' => 'required',
            'id_kelurahan' => 'required',
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required'
        ]);
        $this->pasien->update($id, $request->all());
        return redirect()->route('pasien.index')->with('success', 'Data Pasien Berhasil Diubah');
        // $pasien = Pasien::findOrFail($id);
        // $pasien->id_pasien = $request->id_pasien;
        // $pasien->id_kelurahan = $request->id_kelurahan;
        // $pasien->nama_pasien = $request->nama_pasien;
        // $pasien->alamat = $request->alamat;
        // $pasien->telepon = $request->telepon;
        // $pasien->rt = $request->rt;
        // $pasien->rw = $request->rw;
        // $pasien->jenis_kelamin = $request->jenis_kelamin;
        // $pasien->tanggal_lahir = $request->tanggal_lahir;

        // $pasien->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->pasien->delete($id);
        return redirect()->route('pasien.index')->with('success', 'Data Pasien Berhasil Dihapus');
        // $pasien = Pasien::findOrFail($id);
        // $pasien->delete();
    }
}
