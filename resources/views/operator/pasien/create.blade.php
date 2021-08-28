@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Data Pasien
                </div>
                <div class="card-body">
                    <form action="{{route('pasien.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                @livewire('dropdowns')
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">ID Pasien</label>
                                    <input type="text" name="id_pasien" class="form-control" value="{{ $id_pasien }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Pasien</label>
                                    <input type="text" name="nama_pasien" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Telepon</label>
                                    <input type="text" name="telepon" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">RT</label>
                                    <input type="text" name="rt" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">RW</label>
                                    <input type="text" name="rw" class="form-control" required>
                                </div>
                                {{-- enum --}}
                                <div class="form-group">
                                 <label for="">Jenis Kelamin </label>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Pria">
                                    <label class="form-check-label" for="inlineRadio1">Pria</label>
                                  </div>
                                 <div class="form-check form-check-inline">
                                    
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Wanita">
                                    <label class="form-check-label" for="inlineRadio1">Wanita</label>
                                  </div>
                                </div>
                                {{-- /enum --}}
                                {{-- tanggal lahir --}}
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" required>
                                </div>
                                {{-- /tanggal lahir --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
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


