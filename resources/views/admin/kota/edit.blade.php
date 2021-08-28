@extends('layouts.master')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               Tambah Data Kota
            </div>
            <div class="card-body">
               
                  <form action="{{ route('kota.update', $kota->id) }}" method='post'>
                     @csrf @method('put')
                  <div class="form-group">
                     <label for="">Pilih Provinsi</label>
                     <select name="id_provinsi" id="" class="form-control">
                        @foreach($provinsi as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $kota->id_provinsi ? 'selected':'' }}>{{ $data->nama_provinsi }}</option>
                        @endforeach
                     </select>
                  </div>

                  <div class="form-group">
                     <label for="">Kode Kota</label>
                     <input type="text" name="kode_kota" value="{{ $kota->kode_kota }}" class="form-control" required>
                  </div>

                  <div class="form-group">
                     <label for="">Nama Kota</label>
                     <input type="text" name="nama_kota" value="{{ $kota->nama_kota }}" class="form-control" required>
                  </div>

                  <div class="form-group">
                     <button type="submit" class="btn btn-primary">Edit</button>
                  </div>
                  </form>
                  <div class="form-group">
                     <form action="{{ route('kota.index') }}">
                        <button type="submit" class="btn btn-primary">Kembali</button>
                     </form>
                  </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection