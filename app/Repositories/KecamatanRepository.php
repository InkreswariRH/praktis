<?php

namespace App\Repositories;

use App\Models\Kecamatan;
use App\Models\Kota;


class KecamatanRepository implements KecamatanInterface
{
   // ini adalah method index di controller
   public function all()
   {
      return Kecamatan::with('kota')->get();
   }

   public function forCreate()
   {
      return Kota::all();
   }

   // ini adalah method show di controller
   public function get($id)
   {
      return Kecamatan::findOrFail($id);
   }

   public function store(array $data)
   {
      return Kecamatan::create($data);
   }

   public function update($id, array $data)
   {
      return Kecamatan::findOrFail($id)->update($data);
   }

   public function delete($id)
   {
      return Kecamatan::findOrFail($id)->destroy($id);
   }
}
