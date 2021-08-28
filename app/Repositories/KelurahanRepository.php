<?php

namespace App\Repositories;

use App\Models\Kecamatan;
use App\Models\Kelurahan;


class KelurahanRepository implements KelurahanInterface
{
   // ini adalah method index di controller
   public function all()
   {
      return Kelurahan::with('kecamatan')->get();
   }

   public function forCreate()
   {
      return Kecamatan::all();
   }

   // ini adalah method show di controller
   public function get($id)
   {
      return Kelurahan::findOrFail($id);
   }

   public function store(array $data)
   {
      return Kelurahan::create($data);
   }

   public function update($id, array $data)
   {
      return Kelurahan::findOrFail($id)->update($data);
   }

   public function delete($id)
   {
      return Kelurahan::findOrFail($id)->destroy($id);
   }
}
