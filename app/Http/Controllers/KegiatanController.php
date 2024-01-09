<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $rows = Kegiatan::paginate(5);

        return view('kegiatan.index', compact('rows'));
    }

    public function cari(Request $request)
    {
        $rows = Kegiatan::where('nama_kegiatan', 'LIKE', '%' .$request->cari. '%')->paginate(5);

        return view('kegiatan.cari', compact('rows'));
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function store(Request $request)
    {
        // Simpan data
        Kegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
            'tempat' => $request->tempat,
            'keterangan' => $request->keterangan
        ]);

        // Set pesan alert
        $request->session()->flash('alert-success', 'Data berhasil disimpan!');

        // Arahkan pengguna ke rute yang diinginkan
        return redirect('kegiatan');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Kegiatan::find($id);
        return view('kegiatan.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Kegiatan::findOrFail($id);
        $row->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
            'tempat' => $request->tempat,
            'keterangan' => $request->keterangan
        ]);

        // Set pesan alert
        $request->session()->flash('alert-success', 'Data berhasil diupdate!');

        // Arahkan pengguna ke rute yang diinginkan
        return redirect('kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Kegiatan::findOrFail($id);

        $row->delete();

        // Set pesan alert
        session()->flash('alert-success', 'Data berhasil dihapus!');

        // Arahkan pengguna ke rute yang diinginkan
        return redirect('kegiatan');
    }
}
