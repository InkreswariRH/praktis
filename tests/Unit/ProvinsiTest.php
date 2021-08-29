<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Provinsi;

class ProvinsiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $provinsi = Provinsi::create(["kode_provinsi" => "32", "nama_provinsi" => "Jawa Timur"]);
        $this->assertDatabaseHas('provinsis', [
            'kode_provinsi' => '32', 'nama_provinsi' => "Jawa Timur"
        ]);

        Provinsi::find($provinsi->id)->update(["kode_provinsi" => "33", "nama_provinsi" => "Jawa Tengah"]);
        $this->assertDatabaseHas('provinsis', [
            'kode_provinsi' => '33', 'nama_provinsi' => "Jawa Tengah"
        ]);

        Provinsi::findOrFail($provinsi->id)->destroy($provinsi->id);
        $this->assertDatabaseMissing('provinsis', [
            'kode_provinsi' => '33', 'nama_provinsi' => "Jawa Tengah"
        ]);
    }
}
