<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ustadz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UstadzController extends Controller
{
    public function index()
    {
        $ustadzs = Ustadz::orderBy('urutan')->orderBy('nama')->get();
        return view('admin.ustadz.index', compact('ustadzs'));
    }

    public function create()
    {
        return view('admin.ustadz.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required|string|max:100',
            'gelar'      => 'nullable|string|max:50',
            'jabatan'    => 'required|string|max:100',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'bio'        => 'nullable|string',
            'pendidikan' => 'nullable|string',
            'keahlian'   => 'nullable|string|max:255',
            'urutan'     => 'nullable|integer|min:0',
            'aktif'      => 'nullable|boolean',
        ], [
            'nama.required'    => 'Nama ustadz wajib diisi.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'foto.image'       => 'File harus berupa gambar.',
            'foto.max'         => 'Ukuran foto maksimal 10MB.',
        ]);

        $data = [
            'nama'       => $request->nama,
            'gelar'      => $request->gelar,
            'jabatan'    => $request->jabatan,
            'bio'        => $request->bio,
            'pendidikan' => $request->pendidikan,
            'keahlian'   => $request->keahlian,
            'urutan'     => $request->urutan ?? 0,
            'aktif'      => $request->has('aktif') ? true : false,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('ustadz', 'public');
        }

        Ustadz::create($data);

        return redirect()->route('ustadz-admin.index')
            ->with('success', 'Data ustadz berhasil ditambahkan!');
    }

    public function show(Ustadz $ustadzAdmin)
    {
        return view('admin.ustadz.show', ['ustadz' => $ustadzAdmin]);
    }

    public function edit(Ustadz $ustadzAdmin)
    {
        return view('admin.ustadz.edit', ['ustadz' => $ustadzAdmin]);
    }

    public function update(Request $request, Ustadz $ustadzAdmin)
    {
        $request->validate([
            'nama'       => 'required|string|max:100',
            'gelar'      => 'nullable|string|max:50',
            'jabatan'    => 'required|string|max:100',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'bio'        => 'nullable|string',
            'pendidikan' => 'nullable|string',
            'keahlian'   => 'nullable|string|max:255',
            'urutan'     => 'nullable|integer|min:0',
            'aktif'      => 'nullable|boolean',
        ], [
            'nama.required'    => 'Nama ustadz wajib diisi.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'foto.image'       => 'File harus berupa gambar.',
            'foto.max'         => 'Ukuran foto maksimal 10MB.',
        ]);

        $data = [
            'nama'       => $request->nama,
            'gelar'      => $request->gelar,
            'jabatan'    => $request->jabatan,
            'bio'        => $request->bio,
            'pendidikan' => $request->pendidikan,
            'keahlian'   => $request->keahlian,
            'urutan'     => $request->urutan ?? 0,
            'aktif'      => $request->has('aktif') ? true : false,
        ];

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($ustadzAdmin->foto && Storage::disk('public')->exists($ustadzAdmin->foto)) {
                Storage::disk('public')->delete($ustadzAdmin->foto);
            }
            $data['foto'] = $request->file('foto')->store('ustadz', 'public');
        }

        $ustadzAdmin->update($data);

        return redirect()->route('ustadz-admin.index')
            ->with('success', 'Data ustadz berhasil diperbarui!');
    }

    public function destroy(Ustadz $ustadzAdmin)
    {
        if ($ustadzAdmin->foto && Storage::disk('public')->exists($ustadzAdmin->foto)) {
            Storage::disk('public')->delete($ustadzAdmin->foto);
        }

        $ustadzAdmin->delete();

        return redirect()->route('ustadz-admin.index')
            ->with('success', 'Data ustadz berhasil dihapus!');
    }
}
