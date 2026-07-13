<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();

        return view('admin.kontak.index', compact('kontak'));
    }

    public function create()
    {
        return view('admin.kontak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string',
            'whatsapp' => 'required|string|max:30',
            'email' => 'required|email|max:50|unique:kontak,email',
            'facebook' => 'required|string|max:50',
            'instagram' => 'required|string|max:50',
            'youtube' => 'required|string|max:50',
            'telepon' => 'required|string|max:30',
            'maps_embed' => 'required|string',
        ]);

        Kontak::create($request->all());

        return redirect()->route('kontak-admin.index')->with('success', 'Data kontak berhasil ditambahkan!');
    }

    public function show($id)
    {
        $kontak = Kontak::findOrFail($id);

        return view('admin.kontak.show', compact('kontak'));
    }

    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);

        return view('admin.kontak.edit', compact('kontak'));
    }

    public function update(Request $request, $id)
    {
        $kontak = Kontak::findOrFail($id);

        $request->validate([
            'alamat' => 'required|string',
            'whatsapp' => 'required|string|max:30',
            'email' => 'required|email|max:50|unique:kontak,email,' . $kontak->id_kontak . ',id_kontak',
            'facebook' => 'required|string|max:50',
            'instagram' => 'required|string|max:50',
            'youtube' => 'required|string|max:50',
            'telepon' => 'required|string|max:30',
            'maps_embed' => 'required|string',
        ]);

        $kontak->update($request->all());

        return redirect()->route('kontak-admin.index')->with('success', 'Data kontak berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();

        return redirect()->route('kontak-admin.index')->with('success', 'Data kontak berhasil dihapus!');
    }
}
