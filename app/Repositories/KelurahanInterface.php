<?php

namespace App\Repositories;

interface KelurahanInterface
{

   public function all();

   public function forCreate();

   public function get($id);

   public function store(array $data);

   public function update($id, array $data);

   public function delete($id);
}
