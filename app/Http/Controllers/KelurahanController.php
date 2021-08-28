<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Repositories\KelurahanInterface;

class KelurahanController extends Controller
{
    protected $kelurahan;
    public function __construct(KelurahanInterface $kelurahan)
    {
        $this->kelurahan = $kelurahan;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelurahan = $this->kelurahan->all();
        return view('admin.kelurahan.index', compact('kelurahan'));
        // $kelurahan = Kelurahan::with('kecamatan')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = $this->kelurahan->forCreate();
        return view('admin.kelurahan.create', compact('kecamatan'));
        // $kecamatan = Kecamatan::all();
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
            'id_kecamatan' => 'required',
            'nama_kelurahan' => 'required'
        ]);
        $this->kelurahan->store($request->all());
        return redirect()->route('kelurahan.index')->with('success', 'Data Kelurahan Berhasil Ditambah');
        // $kelurahan = new kelurahan();
        // $kelurahan->id_kecamatan = $request->id_kecamatan;
        // $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        // $kelurahan->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelurahan = $this->kelurahan->get($id);
        return view('admin.kelurahan.show', compact('kelurahan'));
        // $kelurahan = Kelurahan::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kecamatan = $this->kelurahan->forCreate();
        $kelurahan = $this->kelurahan->get($id);
        return view('admin.kelurahan.edit', compact('kelurahan', 'kecamatan'));
        // $kecamatan = Kecamatan::all();
        // $kelurahan = Kelurahan::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kecamatan' => 'required',
            'nama_kelurahan' => 'required'
        ]);
        $this->kelurahan->update($id, $request->all());
        return redirect()->route('kelurahan.index')->with('success', 'Data Kelurahan Berhasil Diubah');
        // $kelurahan = Kelurahan::findOrFail($id);
        // $kelurahan->id_kecamatan = $request->id_kecamatan;
        // $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        // $kelurahan->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->kelurahan->delete($id);
        return redirect()->route('kelurahan.index')->with('success', 'Data Kelurahan Berhasil Dihapus');
        // $kelurahan = Kelurahan::findOrFail($id);
        // $kelurahan->delete();
    }
}
