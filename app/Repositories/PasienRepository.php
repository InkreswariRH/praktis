<?php

namespace App\Repositories;

use App\Models\Pasien;
use App\Models\Kelurahan;
use App\Helpers\Helper;


class PasienRepository implements PasienInterface
{
   // ini adalah method index di controller
   public function all()
   {
      return Pasien::with('kelurahan.kecamatan.kota.provinsi')->orderBy('id', 'DESC')->get();
   }

   public function forCreate()
   {
      return Kelurahan::all();
   }

   public function idGenerator($model, $table, $angka, $prefix, $bulan)
   {
      return Helper::IDGenerator($model, $table, $angka, $prefix, $bulan);
   }

   // ini adalah method show di controller
   public function get($id)
   {
      return Pasien::findOrFail($id);
   }

   public function store(array $data)
   {
      return Pasien::create($data);
   }

   public function update($id, array $data)
   {
      return Pasien::findOrFail($id)->update($data);
   }

   public function delete($id)
   {
      return Pasien::findOrFail($id)->destroy($id);
   }
}
