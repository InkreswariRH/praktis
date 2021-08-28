<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;


class Dropdowns extends Component
{
    public $provinsis;
    public $kotas;
    public $kecamatans;
    public $kelurahans;

    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $selectedKecamatan = null;
    public $selectedKelurahan = null;

    public function mount($selectedKelurahan = null)
    {
        $this->provinsis = Provinsi::all();
        $this->kotas = collect();
        $this->kecamatans = collect();
        $this->kelurahans = collect();
        $this->selectedKelurahan = $selectedKelurahan;

        if (!is_null($selectedKelurahan)) {
            $kelurahan = Kelurahan::with('kecamatan.kota.provinsi')->find($selectedKelurahan);
            if ($kelurahan) {

                $this->kelurahans = Kelurahan::where('id_kecamatan', $kelurahan->id_kecamatan)->get();
                $this->kecamatans = Kecamatan::where('id_kota', $kelurahan->kecamatan->id_kota)->get();
                $this->kotas = Kota::where('id_provinsi', $kelurahan->kecamatan->kota->id_provinsi)->get();
                $this->SelectedProvinsi = $kelurahan->kecamatan->kota->id_provinsi;
                $this->SelectedKota = $kelurahan->kecamatan->id_kota;
                $this->SelectedKecamatan = $kelurahan->id_kecamatan;
            }
        }
    }

    public function render()
    {
        return view('livewire.dropdowns');
    }

    public function updatedSelectedProvinsi($provinsi)
    {
        $this->kotas = Kota::where('id_provinsi', $provinsi)->get();
        $this->selectedKecamatan = NULL;
        $this->selectedKelurahan = NULL;
    }

    public function updatedSelectedKota($kota)
    {
        $this->kecamatans = Kecamatan::where('id_kota', $kota)->get();
        $this->selectedKelurahan = NULL;
    }

    public function updatedSelectedKecamatan($kecamatan)
    {
        if (!is_null($kecamatan)) {
            $this->kelurahans = Kelurahan::where('id_kecamatan', $kecamatan)->get();
        } else {
            $this->selectedKelurahan = null;
        }
    }
}
