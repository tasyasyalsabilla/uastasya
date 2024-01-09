    @extends('layouts.app')
    
    @section('content')
    <div class="container">
    <div class="card">
        <div class="card-body">
            
        <!-- Konten Anda -->
        <script>
            @if(session('alert-success'))
                alert('{{ session('alert-success') }}');
            @endif
        </script>


        <strong><h3>Data Absensi</h3></strong><hr>
        <div class="row mb-3">
            <div class="col-md-4 text-start">
                <form action="{{ url('absensi/cari') }}" method="GET" class="form-inline d-flex">
                    <div class="form-group mr-2">
                        <input type="text" name="cari" class="form-control">
                    </div>
                    <button class="btn btn-primary mr-5"><i class="bi bi-search"></i></button>
                    <a href="{{ url('absensi') }}" class="btn btn-warning"><i class="bi bi-arrow-repeat"></i></a>
                </form>
            </div>
            <div class="col-md-8 text-end">
                <a href="{{ url('absensi/create') }}" class="btn btn-primary mb-3 float-end"><i class="bi bi-plus"></i> Tambah Baru</a>
            </div>
        </div>
        
        <table class="table table-hover table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Kegiatan</th>
                <th scope="col">Tanggal Pelaksanaan</th>
                <th scope="col">Tempat</th>
                <th scope="col">Status Kehadiran</th>
                <th scope="col">Keterangan</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rows as $absensi)
            <tr>
                <th class="text-center">{{ $rows->firstItem() + $loop->index }}</th>
                <td>{{ $absensi->siswa->nama }}</td>
                <td>{{ $absensi->kegiatan->nama_kegiatan }}</td>
                <td>{{ \Carbon\Carbon::parse($absensi->kegiatan->tgl_pelaksanaan)->format('d/m/Y') }}</td>
                <td>{{ $absensi->kegiatan->tempat }}</td>
                <td>{{ $absensi->status_kehadiran }}</td>
                <td>{{ $absensi->keterangan }}</td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="{{ url('absensi/edit/' . $absensi->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ url('absensi/' . $absensi->id) }}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Ingin Menghapus Data Ini ?');">
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $rows->appends(request()->query())->links('pagination::bootstrap-5', ['pageName' => 'page', 'useQueryString' => true]) }}
        </div>
    </div>
    </div>
    @endsection