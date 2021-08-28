<?php

namespace App\Repositories;

use App\Models\Kota;
use App\Models\Provinsi;


class KotaRepository implements KotaInterface
{
   // ini adalah method index di controller
   public function all()
   {
      return Kota::with('provinsi')->get();
   }

   public function forCreate()
   {
      return Provinsi::all();
   }

   // ini adalah method show di controller
   public function get($id)
   {
      return Kota::findOrFail($id);
   }

   public function store(array $data)
   {
      return Kota::create($data);
   }

   public function update($id, array $data)
   {
      return Kota::findOrFail($id)->update($data);
   }

   public function delete($id)
   {
      return Kota::findOrFail($id)->destroy($id);
   }
}
