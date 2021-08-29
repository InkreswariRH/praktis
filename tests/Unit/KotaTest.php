<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Kota;

class KotaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {

        $kotaTest = Kota::create(["kode_kota" => "1012", "nama_kota" => "Surabaya", "id_provinsi" => 30]);
        $this->assertDatabaseHas('kotas', [
            'kode_kota' => '1012', 'nama_kota' => "Surabaya", "id_provinsi" => 30
        ]);

        Kota::find($kotaTest->id)->update(["kode_kota" => "1013", "nama_kota" => "Malang", "id_provinsi" => 29]);
        $this->assertDatabaseHas('kotas', [
            'kode_kota' => '1013', 'nama_kota' => "Malang", "id_provinsi" => 29
        ]);

        Kota::findOrFail($kotaTest->id)->destroy($kotaTest->id);
        $this->assertDatabaseMissing('kotas', [
            'id_provinsi' => 29, 'kode_kota' => '1013', 'nama_kota' => "Malang"
        ]);
    }
}
