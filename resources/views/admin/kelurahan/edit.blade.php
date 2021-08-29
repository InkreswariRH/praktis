@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Kelurahan
                </div>
                <div class="card-body">
                    <form action="{{route('kelurahan.update',$kelurahan->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="">Pilih Kecamatan</label>
                            <select name="id_kecamatan" class="form-control" required>
                                @foreach($kecamatan as $data)
                                    <option value="{{$data->id}}" {{ $data->id ==  $kelurahan->id_kecamatan ? 'selected' : '' }} >{{$data->nama_kecamatan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama kelurahan</label>
                            <input type="text" name="nama_kelurahan" value="{{$kelurahan->nama_kelurahan}}" class="form-control" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    <div class="form-group">
                        <form action="{{ route('kelurahan.index') }}">
                           <button type="submit" class="btn btn-primary">Kembali</button>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
