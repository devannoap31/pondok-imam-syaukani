<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->get();

        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tipe' => 'required|in:foto,video',
            'file_path' => 'required|file|max:20480',
            'deskripsi' => 'required|string',
        ]);

        $filePath = $request->file('file_path')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'tipe' => $request->tipe,
            'file_path' => $filePath,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('galeri-admin.index')->with('success', 'Data galeri berhasil ditambahkan!');
    }

    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('admin.galeri.show', compact('galeri'));
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'tipe' => 'required|in:foto,video',
            'file_path' => 'nullable|file|max:20480',
            'deskripsi' => 'required|string',
        ]);

        $data = [
            'judul' => $request->judul,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('file_path')) {
            if ($galeri->file_path && Storage::disk('public')->exists($galeri->file_path)) {
                Storage::disk('public')->delete($galeri->file_path);
            }

            $data['file_path'] = $request->file('file_path')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->route('galeri-admin.index')->with('success', 'Data galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->file_path && Storage::disk('public')->exists($galeri->file_path)) {
            Storage::disk('public')->delete($galeri->file_path);
        }

        $galeri->delete();

        return redirect()->route('galeri-admin.index')->with('success', 'Data galeri berhasil dihapus!');
    }
}
