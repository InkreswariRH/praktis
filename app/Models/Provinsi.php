<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $fillable = ['kode_provinsi', 'nama_provinsi'];
    public $timestamps = true;

    // artinya, model provinsi dapat memiliki banyak data dari model kota melalui id_provinsi. id_provinsi adalah foreign key di tabel kota.
    public function kota()
    {
        return $this->hasMany('App\Models\Kota', 'id_provinsi');
    }
}
