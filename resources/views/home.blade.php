@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="mb-4">{{ __('Halo,') }} <strong>{{ Auth::user()->name }}</strong>! {{ __('Selamat datang!!') }}</p>
                    
                    <div class="alert alert-info" role="alert">
                        {{ __(' Selamat datang di portal data kehadiran siswa pkl smk swasta padamu negeri medan . data akan digunakan untuk memastikan kehadiran dan partisipasi pada setiap siswa pkl dalam melakukan kegiatan dalam proses pkl. Data kehadiran sangat penting karena merupakan bagian penting dari penilaian akhir pada hasil magang dan menjadi penilaian dalam tingkat kedisiplinan dan tanggung jawab sebagai peserta magang.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
