<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Qris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QrisController extends Controller
{
    public function index()
    {
        $qris = Qris::latest()->get();

        return view('admin.qris.index', compact('qris'));
    }

    public function create()
    {
        return view('admin.qris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penerima' => 'required|string|max:40',
            'gambar_qris' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'aktif' => 'required|boolean',
        ]);

        $imagePath = $request->file('gambar_qris')->store('qris', 'public');

        Qris::create([
            'nama_penerima' => $request->nama_penerima,
            'gambar_qris' => $imagePath,
            'aktif' => $request->aktif,
        ]);

        return redirect()->route('qris.index')->with('success', 'QRIS berhasil ditambahkan!');
    }

    public function show($id)
    {
        $qris = Qris::findOrFail($id);

        return view('admin.qris.show', compact('qris'));
    }

    public function edit($id)
    {
        $qris = Qris::findOrFail($id);

        return view('admin.qris.edit', compact('qris'));
    }

    public function update(Request $request, $id)
    {
        $qris = Qris::findOrFail($id);

        $request->validate([
            'nama_penerima' => 'required|string|max:40',
            'gambar_qris' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'aktif' => 'required|boolean',
        ]);

        $data = [
            'nama_penerima' => $request->nama_penerima,
            'aktif' => $request->aktif,
        ];

        if ($request->hasFile('gambar_qris')) {
            if ($qris->gambar_qris && Storage::disk('public')->exists($qris->gambar_qris)) {
                Storage::disk('public')->delete($qris->gambar_qris);
            }

            $data['gambar_qris'] = $request->file('gambar_qris')->store('qris', 'public');
        }

        $qris->update($data);

        return redirect()->route('qris.index')->with('success', 'QRIS berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $qris = Qris::findOrFail($id);

        if ($qris->gambar_qris && Storage::disk('public')->exists($qris->gambar_qris)) {
            Storage::disk('public')->delete($qris->gambar_qris);
        }

        $qris->delete();

        return redirect()->route('qris.index')->with('success', 'QRIS berhasil dihapus!');
    }
}
