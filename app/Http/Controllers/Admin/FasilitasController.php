<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FasilitasPesantren;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = FasilitasPesantren::orderBy('urutan')->orderBy('id_fasilitas')->get();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas'    => 'required|string|max:150',
            'deskripsi_singkat' => 'nullable|string|max:255',
            'detail'            => 'required|string',
            'icon'              => 'nullable|string|max:50',
            'urutan'            => 'nullable|integer|min:0',
            'aktif'             => 'nullable|boolean',
        ], [
            'nama_fasilitas.required' => 'Nama fasilitas / kategori wajib diisi.',
            'detail.required'         => 'Rincian data / detail wajib diisi.',
        ]);

        FasilitasPesantren::create([
            'nama_fasilitas'    => $request->nama_fasilitas,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'detail'            => $request->detail,
            'icon'              => $request->icon ?: '🏢',
            'urutan'            => $request->urutan ?? 0,
            'aktif'             => $request->has('aktif') ? true : false,
        ]);

        return redirect()->route('fasilitas-admin.index')
            ->with('success', 'Data fasilitas & statistik berhasil ditambahkan!');
    }

    public function show(FasilitasPesantren $fasilitasAdmin)
    {
        return redirect()->route('fasilitas-admin.edit', $fasilitasAdmin->id_fasilitas);
    }

    public function edit(FasilitasPesantren $fasilitasAdmin)
    {
        return view('admin.fasilitas.edit', ['fasilitas' => $fasilitasAdmin]);
    }

    public function update(Request $request, FasilitasPesantren $fasilitasAdmin)
    {
        $request->validate([
            'nama_fasilitas'    => 'required|string|max:150',
            'deskripsi_singkat' => 'nullable|string|max:255',
            'detail'            => 'required|string',
            'icon'              => 'nullable|string|max:50',
            'urutan'            => 'nullable|integer|min:0',
            'aktif'             => 'nullable|boolean',
        ], [
            'nama_fasilitas.required' => 'Nama fasilitas / kategori wajib diisi.',
            'detail.required'         => 'Rincian data / detail wajib diisi.',
        ]);

        $fasilitasAdmin->update([
            'nama_fasilitas'    => $request->nama_fasilitas,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'detail'            => $request->detail,
            'icon'              => $request->icon ?: '🏢',
            'urutan'            => $request->urutan ?? 0,
            'aktif'             => $request->has('aktif') ? true : false,
        ]);

        return redirect()->route('fasilitas-admin.index')
            ->with('success', 'Data fasilitas & statistik berhasil diperbarui!');
    }

    public function destroy(FasilitasPesantren $fasilitasAdmin)
    {
        $fasilitasAdmin->delete();

        return redirect()->route('fasilitas-admin.index')
            ->with('success', 'Data fasilitas berhasil dihapus!');
    }
}
