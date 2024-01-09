<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kegiatan;
use App\Models\Absensi;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $rows = Absensi::with('siswa', 'kegiatan')->paginate(5);
        return view('absensi.index', compact('rows'));

    }

    public function cari(Request $request)
    {
        $rows = Absensi::whereHas('siswa', function ($query) use ($request) {
        $query->where('nama', 'LIKE', '%' . $request->cari . '%');
        })->paginate(5);

        return view('absensi.cari', compact('rows'));
    }

    public function create()
    {
        $siswas = Siswa::select('id', 'nama')->get();
        $kegiatans = Kegiatan::select('id', 'nama_kegiatan')->get();

        return view('absensi.create', compact('siswas','kegiatans'));
    }

    public function store(Request $request)
    {

        // Simpan data
        Absensi::create([
            'id_siswa' => $request->id_siswa,
            'id_kegiatan' => $request->id_kegiatan,
            'status_kehadiran' => $request->status_kehadiran,
            'keterangan' => $request->keterangan
        ]);

        // Set pesan alert
        $request->session()->flash('alert-success', 'Data berhasil disimpan!');

        // Arahkan pengguna ke rute yang diinginkan
        return redirect('absensi');
    }

    public function edit(string $id)
    {
        $row = Absensi::findOrFail($id);
        $siswas = Siswa::select('id', 'nama')->get();
        $kegiatans = Kegiatan::select('id', 'nama_kegiatan')->get();

        return view('absensi.edit', compact('row', 'siswas','kegiatans'));
    }

    public function update(Request $request, string $id)
    {
        $row = Absensi::findOrFail($id);
        $row->update([
            'id_siswa' => $request->id_siswa,
            'id_kegiatan' => $request->id_kegiatan,
            'status_kehadiran' => $request->status_kehadiran,
            'keterangan' => $request->keterangan
        ]);

        // Set pesan alert
        $request->session()->flash('alert-success', 'Data berhasil diupdate!');

        // Arahkan pengguna ke rute yang diinginkan
        return redirect('absensi');
    }

    public function destroy(string $id)
    {
        $row = Absensi::findOrFail($id);

        $row->delete();

        // Set pesan alert
        session()->flash('alert-success', 'Data berhasil dihapus!');

        // Arahkan pengguna ke rute yang diinginkan
        return redirect('absensi');
    }
}
