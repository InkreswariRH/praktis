<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Pasien;

class PasienTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $pasienTest = Pasien::create([
            'id_pasien' => '30',
            'id_kelurahan' => '1',
            'nama_pasien' => 'mr. x',
            'alamat' => 'indonesia',
            'telepon' => '1234',
            'rt' => '009',
            'rw' => '005',
            'jenis_kelamin' => 'Wanita',
            'tanggal_lahir' => '2000-09-11'
        ]);
        $this->assertDatabaseHas('pasiens', [
            'id_pasien' => '30',
            'id_kelurahan' => '1',
            'nama_pasien' => 'mr. x',
            'alamat' => 'indonesia',
            'telepon' => '1234',
            'rt' => '009',
            'rw' => '005',
            'jenis_kelamin' => 'Wanita',
            'tanggal_lahir' => '2000-09-11'
        ]);

        Pasien::find($pasienTest->id)->update([
            'id_pasien' => '31',
            'id_kelurahan' => '1',
            'nama_pasien' => 'mr. y',
            'alamat' => 'jepang',
            'telepon' => '4321',
            'rt' => '010',
            'rw' => '006',
            'jenis_kelamin' => 'Pria',
            'tanggal_lahir' => '2002-09-13'
        ]);
        $this->assertDatabaseHas('pasiens', [
            'id_pasien' => '31',
            'id_kelurahan' => '1',
            'nama_pasien' => 'mr. y',
            'alamat' => 'jepang',
            'telepon' => '4321',
            'rt' => '010',
            'rw' => '006',
            'jenis_kelamin' => 'Pria',
            'tanggal_lahir' => '2002-09-13'
        ]);

        Pasien::findOrFail($pasienTest->id)->destroy($pasienTest->id);
        $this->assertDatabaseMissing('pasiens', [
            'id_pasien' => '31',
            'id_kelurahan' => '1',
            'nama_pasien' => 'mr. y',
            'alamat' => 'jepang',
            'telepon' => '4321',
            'rt' => '010',
            'rw' => '006',
            'jenis_kelamin' => 'Pria',
            'tanggal_lahir' => '2002-09-13'
        ]);
    }
}
