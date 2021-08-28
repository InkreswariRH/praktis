@extends('layouts.master')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               Lihat Data Provinsi
            </div>
            <div class="card-body">
               
               <div class="form-group">
                  <label for="">Kode Provinsi</label>
                  <input type="text" name="kode_provinsi" class="form-control" value= "{{ $provinsi->kode_provinsi }}" id="" readonly>
               </div>

               <div class="form-group">
                  <label for="">Nama Provinsi</label>
                  <input type="text" name="nama_provinsi" class="form-control" value="{{ $provinsi->nama_provinsi }}" id="" readonly>
               </div>

               <div class="form-group">
                  <form action="{{ route('provinsi.index') }}">
                  <button type="submit" class="btn btn-primary">Kembali</button>
               </form>
               </div>
            
            </div>
         </div>
      </div>
   </div>
</div>
@endsection