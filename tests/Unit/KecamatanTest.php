<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Kecamatan;

class KecamatanTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $kecamatanTest = Kecamatan::create(["id_kota" => "2", "nama_kecamatan" => "Test aja"]);
        $this->assertDatabaseHas('kecamatans', [
            "id_kota" => "2", "nama_kecamatan" => "Test aja"
        ]);

        Kecamatan::find($kecamatanTest->id)->update(["id_kota" => "1", "nama_kecamatan" => "Test"]);
        $this->assertDatabaseHas('kecamatans', [
            "id_kota" => "1", "nama_kecamatan" => "Test"
        ]);

        Kecamatan::findOrFail($kecamatanTest->id)->destroy($kecamatanTest->id);
        $this->assertDatabaseMissing('kecamatans', [
            "id_kota" => "1", "nama_kecamatan" => "Test"
        ]);
    }
}
