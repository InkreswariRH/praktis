@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Pasien
                </div>
                <div class="card-body">
                        <div class="row">
                           
                            <div class="col">  
                              <fieldset disabled>                           
                              @livewire('dropdowns',['selectedKelurahan'=>$pasien->id_kelurahan,
                              'selectedKecamatan'=>$pasien->kelurahan->id_kecamatan,
                              'selectedKota'=>$pasien->kelurahan->kecamatan->id_kota,
                              'selectedProvinsi'=>$pasien->kelurahan->kecamatan->kota->id_provinsi])
                           </fieldset>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">ID Pasien</label>
                                    <input type="text" name="id_pasien" class="form-control" value="{{ $pasien->id_pasien }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Pasien</label>
                                    <input type="text" name="nama_pasien" class="form-control" value="{{ $pasien->nama_pasien }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="{{ $pasien->alamat }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Telepon</label>
                                    <input type="text" name="telepon" class="form-control" value="{{ $pasien->telepon }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">RT</label>
                                    <input type="text" name="rt" class="form-control" value="{{ $pasien->rt }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">RW</label>
                                    <input type="text" name="rw" class="form-control" value="{{ $pasien->rw }}" readonly>
                                </div>
                                {{-- enum --}}
                                <div class="form-group">
                                 <label for="">Jenis Kelamin </label>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Pria" readonly {{ $pasien->jenis_kelamin == "Pria" ? 'checked':'' }}>
                                    <label class="form-check-label" for="inlineRadio1">Pria</label>
                                  </div>
                                 <div class="form-check form-check-inline">
                                    
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Wanita" readonly {{ $pasien->jenis_kelamin == "Wanita" ? 'checked':'' }}>
                                    <label class="form-check-label" for="inlineRadio1">Wanita</label>
                                  </div>
                                </div>
                                {{-- /enum --}}
                                {{-- tanggal lahir --}}
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $pasien->tanggal_lahir }}" readonly>
                                </div>
                                {{-- /tanggal lahir --}}
                            </div>
                        </div>
                        
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


