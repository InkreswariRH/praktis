@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data pasien
                    <a href="{{route('pasien.create')}}"
                       class="btn btn-primary float-right">
                        Tambah Pasien
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <tr>
                                <th>No</th>
                                <th>ID Pasien</th>
                                <th>Nama Pasien</th>
                                <th>Aksi</th>
                            </tr>
                            @php $nomor=1; @endphp
                            @foreach($pasien as $data)
                            <tr>
                                <td>{{$nomor++}}</td>
                                <td>
                                    {{$data->id_pasien}}
                                </td>
                                <td>{{$data->nama_pasien}}</td>
                                <td>
                                    <form action="{{route('pasien.destroy',$data->id)}}" method="post">
                                        @csrf @method('delete')
                                        <a href="{{route('pasien.edit',$data->id)}}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{route('pasien.show',$data->id)}}" class="btn btn-warning btn-sm">Show</a>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin dihapus?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


