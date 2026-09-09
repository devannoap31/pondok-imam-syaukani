<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PenyaluranDana;
use Illuminate\Http\Request;

class PenyaluranDanaController extends Controller
{
    public function index()
    {
        $penyalurans = PenyaluranDana::orderBy('urutan')->latest('id_penyaluran')->get();
        return view('admin.penyaluran_dana.index', compact('penyalurans'));
    }

    public function create()
    {
        return view('admin.penyaluran_dana.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'icon' => 'required|string|max:100',
            'tag' => 'nullable|string|max:50',
            'warna' => 'required|string|max:30',
            'urutan' => 'required|integer|min:1',
            'aktif' => 'required|boolean',
        ]);

        PenyaluranDana::create($request->all());

        return redirect()->route('penyaluran-dana.index')->with('success', 'Data penyaluran dana berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $penyaluran = PenyaluranDana::findOrFail($id);
        return view('admin.penyaluran_dana.edit', compact('penyaluran'));
    }

    public function update(Request $request, $id)
    {
        $penyaluran = PenyaluranDana::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'icon' => 'required|string|max:100',
            'tag' => 'nullable|string|max:50',
            'warna' => 'required|string|max:30',
            'urutan' => 'required|integer|min:1',
            'aktif' => 'required|boolean',
        ]);

        $penyaluran->update($request->all());

        return redirect()->route('penyaluran-dana.index')->with('success', 'Data penyaluran dana berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $penyaluran = PenyaluranDana::findOrFail($id);
        $penyaluran->delete();

        return redirect()->route('penyaluran-dana.index')->with('success', 'Data penyaluran dana berhasil dihapus!');
    }
}
