<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        return view('admin.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'file_jadwal' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:10240',
        ]);

        $data = $request->except('file_jadwal');

        if ($request->hasFile('file_jadwal')) {
            $data['file_jadwal'] = $request->file('file_jadwal')->store('jadwal', 'public');
        } else {
            $data['file_jadwal'] = ''; // fallback because NOT NULL in db
        }

        Jadwal::create($data);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'file_jadwal' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:10240',
        ]);

        $data = $request->except('file_jadwal');

        if ($request->hasFile('file_jadwal')) {
            if ($jadwal->file_jadwal && Storage::disk('public')->exists($jadwal->file_jadwal)) {
                Storage::disk('public')->delete($jadwal->file_jadwal);
            }
            $data['file_jadwal'] = $request->file('file_jadwal')->store('jadwal', 'public');
        }

        $jadwal->update($data);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        if ($jadwal->file_jadwal && Storage::disk('public')->exists($jadwal->file_jadwal)) {
            Storage::disk('public')->delete($jadwal->file_jadwal);
        }
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}