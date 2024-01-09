@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Tambah Siswa</h5>
            <div class="col-sm-8">
                <form class="row g-3 mt-2" action="{{ url('siswa') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS*</label>
                        <input type="text" class="form-control" id="nis" name="nis" placeholder="Inputkan NIS Siswa..." required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama*</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Inputkan Nama Siswa..." required>
                    </div>

                    
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas*</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Inputkan Kelas..." required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat*</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Inputkan Alamat..." required>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ url('siswa') }}" class="btn btn-warning" >Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
