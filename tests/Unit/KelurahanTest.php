<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Kelurahan;

class KelurahanTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $kelurahanTest = Kelurahan::create(["id_kecamatan" => "2", "nama_kelurahan" => "Test kelurahan"]);
        $this->assertDatabaseHas('kelurahans', [
            "id_kecamatan" => "2", "nama_kelurahan" => "Test kelurahan"
        ]);

        Kelurahan::find($kelurahanTest->id)->update(["id_kecamatan" => "1", "nama_kelurahan" => "kelurahan"]);
        $this->assertDatabaseHas('kelurahans', [
            "id_kecamatan" => "1", "nama_kelurahan" => "kelurahan"
        ]);

        Kelurahan::findOrFail($kelurahanTest->id)->destroy($kelurahanTest->id);
        $this->assertDatabaseMissing('kelurahans', [
            "id_kecamatan" => "1", "nama_kelurahan" => "kelurahan"
        ]);
    }
}
