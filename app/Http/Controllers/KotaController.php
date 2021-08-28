<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Repositories\KotaInterface;

class KotaController extends Controller
{
    protected $kota;
    public function __construct(KotaInterface $kota)
    {
        $this->kota = $kota;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kota = $this->kota->all();
        return view('admin.kota.index', compact('kota'));
        // $kota = Kota::with('provinsi')->get();
    }


    public function create()
    {
        $provinsi = $this->kota->forCreate();
        return view('admin.kota.create', compact('provinsi'));
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
            'id_provinsi' => 'required',
            'kode_kota' => 'required',
            'nama_kota' => 'required'
        ]);

        $this->kota->store($request->all());
        return redirect()->route('kota.index')->with('success', 'Data Kota Berhasil Ditambahkan');
        // $kota = new Kota();
        // $kota->id_provinsi = $request->id_provinsi;
        // $kota->kode_kota = $request->kode_kota;
        // $kota->nama_kota = $request->nama_kota;
        // $kota->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kota = $this->kota->get($id);
        return view('admin.kota.show', compact('kota'));
        // $kota = Kota::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kota = $this->kota->get($id);
        $provinsi = $this->kota->forCreate();
        return view('admin.kota.edit', compact('kota', 'provinsi'));
        // $kota = Kota::findOrFail($id);
        // $provinsi = Provinsi::all();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_provinsi' => 'required',
            'kode_kota' => 'required',
            'nama_kota' => 'required'
        ]);

        $this->kota->update($id, $request->all());
        return redirect()->route('kota.index')->with('success', 'Data Kota Berhasil Diubah');
        // $kota = Kota::findOrFail($id);
        // $kota->id_provinsi = $request->id_provinsi;
        // $kota->kode_kota = $request->kode_kota;
        // $kota->nama_kota = $request->nama_kota;
        // $kota->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->kota->delete($id);
        return redirect()->route('kota.index')->with('success', 'Data Kota Berhasil Dihapus');
        // $kota = Kota::findOrFail($id);
        // $kota->delete();
    }
}
