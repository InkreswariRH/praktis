<?php

namespace App\Repositories;

interface PasienInterface
{

   public function all();

   public function forCreate();

   public function idGenerator($model, $table, $angka, $prefix, $bulan);

   public function get($id);

   public function store(array $data);

   public function update($id, array $data);

   public function delete($id);
}
