@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Pasien
                </div>
                <div class="card-body">
                    <form action="{{route('pasien.update',$pasien->id)}}" method="post">
                        @csrf @method('put')
                        <div class="row">
                            <div class="col">
                                @livewire('dropdowns',['selectedKelurahan'=>$pasien->id_kelurahan,
                                            'selectedKecamatan'=>$pasien->kelurahan->id_kecamatan,
                                            'selectedKota'=>$pasien->kelurahan->kecamatan->id_kota,
                                            'selectedProvinsi'=>$pasien->kelurahan->kecamatan->kota->id_provinsi])
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">ID Pasien</label>
                                    <input type="text" name="id_pasien" class="form-control" value="{{$pasien->id_pasien}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Kelurahan</label>
                                    <input type="text" name="id_kelurahan" class="form-control" value="{{$pasien->id_kelurahan}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Pasien</label>
                                    <input type="text" name="nama_pasien" class="form-control" value="{{$pasien->nama_pasien}}" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="{{$pasien->alamat}}" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="">Telepon</label>
                                    <input type="text" name="telepon" class="form-control" value="{{$pasien->telepon}}" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="">RT</label>
                                    <input type="text" name="rt" class="form-control" value="{{$pasien->rt}}" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="">RW</label>
                                    <input type="text" name="rw" class="form-control" value="{{$pasien->rw}}" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                 <label for="">Jenis Kelamin </label>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Pria" {{ $pasien->jenis_kelamin == "Pria" ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio1">Pria</label>
                                  </div>
                                 <div class="form-check form-check-inline">
                                    
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Wanita" {{ $pasien->jenis_kelamin == "Wanita" ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio1">Wanita</label>
                                  </div>
                                </div>

                                <div class="form-group">
                                 <label for="">Tanggal Lahir</label>
                                 <input type="date" name="tanggal_lahir" class="form-control" value="{{$pasien->tanggal_lahir}}" required>
                             </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Edit</button>
                        </div>
                    </form>
                    <div class="form-group">
                       <form action="{{ route('pasien.index') }}">
                     <button type="submit" class="btn btn-primary">Kembali</button>
                  </form>
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


