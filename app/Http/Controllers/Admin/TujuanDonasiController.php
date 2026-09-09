<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TujuanDonasi;
use Illuminate\Http\Request;

class TujuanDonasiController extends Controller
{
    public function index()
    {
        $tujuans = TujuanDonasi::orderBy('urutan')->latest('id_tujuan')->get();
        return view('admin.tujuan_donasi.index', compact('tujuans'));
    }

    public function create()
    {
        return view('admin.tujuan_donasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor' => 'required|string|max:10',
            'judul' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'warna' => 'required|string|max:30',
            'urutan' => 'required|integer|min:1',
            'aktif' => 'required|boolean',
        ]);

        TujuanDonasi::create($request->all());

        return redirect()->route('tujuan-donasi.index')->with('success', 'Data tujuan donasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $tujuan = TujuanDonasi::findOrFail($id);
        return view('admin.tujuan_donasi.edit', compact('tujuan'));
    }

    public function update(Request $request, $id)
    {
        $tujuan = TujuanDonasi::findOrFail($id);

        $request->validate([
            'nomor' => 'required|string|max:10',
            'judul' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'warna' => 'required|string|max:30',
            'urutan' => 'required|integer|min:1',
            'aktif' => 'required|boolean',
        ]);

        $tujuan->update($request->all());

        return redirect()->route('tujuan-donasi.index')->with('success', 'Data tujuan donasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $tujuan = TujuanDonasi::findOrFail($id);
        $tujuan->delete();

        return redirect()->route('tujuan-donasi.index')->with('success', 'Data tujuan donasi berhasil dihapus!');
    }
}
