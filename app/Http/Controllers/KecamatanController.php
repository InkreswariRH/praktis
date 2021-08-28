<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Http\Request;
use App\Repositories\KecamatanInterface;

class KecamatanController extends Controller
{
    protected $kecamatan;
    public function __construct(KecamatanInterface $kecamatan)
    {
        $this->kecamatan = $kecamatan;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = $this->kecamatan->all();
        return view('admin.kecamatan.index', compact('kecamatan'));
        // $kecamatan = Kecamatan::with('kota')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = $this->kecamatan->forCreate();
        // $kota = Kota::all();
        return view('admin.kecamatan.create', compact('kota'));
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
            'id_kota' => 'required',
            'nama_kecamatan' => 'required'
        ]);

        $this->kecamatan->store($request->all());
        return redirect()->route('kecamatan.index')->with('success', 'Data Kecamatan Berhasil Ditambah');
        // $kecamatan = new kecamatan();
        // $kecamatan->id_kota = $request->id_kota;
        // $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        // $kecamatan->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kecamatan = $this->kecamatan->get($id);
        return view('admin.kecamatan.show', compact('kecamatan'));
        // $kecamatan = Kecamatan::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kota = $this->kecamatan->forCreate();
        $kecamatan = $this->kecamatan->get($id);
        return view('admin.kecamatan.edit', compact('kecamatan', 'kota'));
        // $kota = Kota::all();
        // $kecamatan = Kecamatan::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kota' => 'required',
            'nama_kecamatan' => 'required'
        ]);
        $this->kecamatan->update($id, $request->all());
        return redirect()->route('kecamatan.index')->with('success', 'Data Kecamatan Berhasil Diubah');
        // $kecamatan = Kecamatan::findOrFail($id);
        // $kecamatan->id_kota = $request->id_kota;
        // $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        // $kecamatan->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->kecamatan->delete($id);
        return redirect()->route('kecamatan.index')->with('success', 'Data Kecamatan Berhasil Dihapus');
        // $kecamatan = Kecamatan::findOrFail($id);
        // $kecamatan->delete();
    }
}
