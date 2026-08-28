<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramPendidikanController extends Controller
{
    public function index()
    {
        $program = ProgramPendidikan::all();
        return view('admin.program.index', compact('program'));
    }

    public function create()
    {
        return view('admin.program.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'subjudul' => 'nullable|string|max:255',
            'deskripsi' => 'required',
            'keunggulan_text' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'urutan' => 'nullable|integer|min:0|max:65535',
        ]);

        $data = $request->except(['gambar', 'keunggulan_text']);
        $data['keunggulan'] = $this->parseKeunggulan($request->input('keunggulan_text'));
        $data['aktif'] = $request->boolean('aktif');
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('program', 'public');
        } else {
            $data['gambar'] = '';
        }

        ProgramPendidikan::create($data);
        return redirect()->route('program-pendidikan.index')->with('success', 'Program pendidikan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $program = ProgramPendidikan::findOrFail($id);
        return view('admin.program.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $program = ProgramPendidikan::findOrFail($id);
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'subjudul' => 'nullable|string|max:255',
            'deskripsi' => 'required',
            'keunggulan_text' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'urutan' => 'nullable|integer|min:0|max:65535',
        ]);

        $data = $request->except(['gambar', 'keunggulan_text']);
        $data['keunggulan'] = $this->parseKeunggulan($request->input('keunggulan_text'));
        $data['aktif'] = $request->boolean('aktif');
        if ($request->hasFile('gambar')) {
            if ($program->gambar && Storage::disk('public')->exists($program->gambar)) {
                Storage::disk('public')->delete($program->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('program', 'public');
        }

        $program->update($data);
        return redirect()->route('program-pendidikan.index')->with('success', 'Program pendidikan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $program = ProgramPendidikan::findOrFail($id);
        if ($program->gambar && Storage::disk('public')->exists($program->gambar)) {
            Storage::disk('public')->delete($program->gambar);
        }
        $program->delete();
        return redirect()->route('program-pendidikan.index')->with('success', 'Program pendidikan berhasil dihapus!');
    }

    private function parseKeunggulan(?string $value): array
    {
        return collect(preg_split('/\r\n|\r|\n/', $value ?? ''))
            ->map(fn($item) => trim($item))
            ->filter()
            ->values()
            ->all();
    }
}
