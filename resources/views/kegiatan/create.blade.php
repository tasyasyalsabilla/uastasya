@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Tambah Kegiatan</h5>
            <div class="col-sm-8">
                <form class="row g-3 mt-2" action="{{ url('kegiatan') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan*</label>
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Inputkan Nama Kegiatan..." required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pelaksanaan" class="form-label">Tanggal Pelaksanaan*</label>
                        <input type="date" class="form-control" id="tgl_pelaksanaan" name="tgl_pelaksanaan" placeholder="Inputkan Tanggal Pelaksanaan..." required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat" class="form-label">Tempat*</label>
                        <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Inputkan Tempat Kegiatan..." required>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan*</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Inputkan Keterangan..." required>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ url('kegiatan') }}" class="btn btn-warning" >Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
