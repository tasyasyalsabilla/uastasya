@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Edit Absensi</h5>
            <div class="col-sm-8">
                <form class="row g-3 mt-2" action="{{ url('absensi/' . $row->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="id_siswa" class="form-label">Nama Siswa*</label>
                        <select class="form-control" name="id_siswa" id="id_siswa">
                            <option value="">-- Pilih --</option>
                            @foreach($siswas as $siswa)
                                <option value="{{ $siswa->id }}" {{ $row->id_siswa == $siswa->id ? 'selected' : ''}}>{{ $siswa->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_kegiatan" class="form-label">Kegiatan*</label>
                        <select class="form-control" name="id_kegiatan" id="id_kegiatan">
                            <option value="">-- Pilih --</option>
                            @foreach($kegiatans as $kegiatan)
                                <option value="{{ $kegiatan->id }}" {{ $row->id_kegiatan == $kegiatan->id ? 'selected' : ''}}>{{ $kegiatan->nama_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status_kehadiran" class="form-label">Status Kehadiran*</label>
                        <select class="form-control" name="status_kehadiran" id="status_kehadiran">
                            <option value="">-- Pilih --</option>
                            <option value="hadir" {{ strcasecmp($row->status_kehadiran, 'hadir') === 0 ? 'selected' : '' }}>Hadir</option>
                            <option value="tidak hadir" {{ strcasecmp($row->status_kehadiran, 'tidak hadir') === 0 ? 'selected' : '' }}>Tidak Hadir</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan*</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $row->keterangan }}" placeholder="Inputkan Keterangan Siswa..." required>
                    </div> 

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ url('absensi') }}" class="btn btn-warning" >Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
