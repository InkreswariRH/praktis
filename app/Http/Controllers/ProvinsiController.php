<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;
use App\Repositories\ProvinsiInterface;

class ProvinsiController extends Controller
{
    protected $provinsi;
    public function __construct(ProvinsiInterface $provinsi)
    {
        $this->provinsi = $provinsi;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = $this->provinsi->all();
        return view('admin.provinsi.index', compact('provinsi'));
        // $provinsi = Provinsi::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provinsi.create');
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
            'kode_provinsi' => 'required',
            'nama_provinsi' => 'required'
        ]);

        $this->provinsi->store($request->all());
        return redirect()->route('provinsi.index')->with('success', 'Data Provinsi Berhasil Ditambahkan');
        // $provinsi = new Provinsi();
        // $provinsi->kode_provinsi = $request->kode_provinsi;
        // $provinsi->nama_provinsi = $request->nama_provinsi;
        // $provinsi->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provinsi = $this->provinsi->get($id);
        return view('admin.provinsi.show', compact('provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = $this->provinsi->get($id);
        return view('admin.provinsi.edit', compact('provinsi'));
        // $provinsi = Provinsi::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'kode_provinsi' => 'required',
            'nama_provinsi' => 'required'
        ]);

        $this->provinsi->update($id, $request->all());
        return redirect()->route('provinsi.index')->with('success', 'Data Provinsi Berhasil Diubah');
        // $provinsi = Provinsi::findOrFail($id);
        // $provinsi->kode_provinsi = $request->kode_provinsi;
        // $provinsi->nama_provinsi = $request->nama_provinsi;
        // $provinsi->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->provinsi->delete($id);
        return redirect()->route('provinsi.index')->with('success', 'Data Provinsi Berhasil Dihapus');
        // $provinsi = Provinsi::findOrFail($id);
        // $provinsi->delete();
    }
}
