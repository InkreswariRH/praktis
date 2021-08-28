<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $fillable = ['id_pasien', 'nama_pasien', 'alamat', 'telepon', 'rt', 'rw', 'jenis_kelamin', 'tanggal_lahir'];
    public $timestamps = true;

    public function kelurahan()
    {
        return $this->belongsTo('App\Models\Kelurahan', 'id_kelurahan');
    }
}
