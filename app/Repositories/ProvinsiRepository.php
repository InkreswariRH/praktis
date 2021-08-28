<?php

namespace App\Repositories;

use App\Models\Provinsi;


class ProvinsiRepository implements ProvinsiInterface
{
   // ini adalah method index di controller
   public function all()
   {
      return Provinsi::all();
   }

   // ini adalah method show di controller
   public function get($id)
   {
      return Provinsi::findOrFail($id);
   }

   public function store(array $data)
   {
      return Provinsi::create($data);
   }

   public function update($id, array $data)
   {
      return Provinsi::findOrFail($id)->update($data);
   }

   public function delete($id)
   {
      return Provinsi::findOrFail($id)->destroy($id);
   }
}
