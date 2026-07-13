<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        $donasi = Donasi::latest('tanggal_donasi')->get();

        return view('admin.donasi.index', compact('donasi'));
    }

    public function create()
    {
        return view('admin.donasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_donatur' => 'required|string|max:40',
            'nominal' => 'required|numeric|min:0',
            'tanggal_donasi' => 'required|date',
            'keterangan' => 'required|string',
            'id_transaksi' => 'required|integer|unique:donasi,id_transaksi',
        ]);

        Donasi::create($request->all());

        return redirect()->route('donasi.index')->with('success', 'Data donasi berhasil ditambahkan!');
    }

    public function show($id)
    {
        $donasi = Donasi::findOrFail($id);

        return view('admin.donasi.show', compact('donasi'));
    }

    public function edit($id)
    {
        $donasi = Donasi::findOrFail($id);

        return view('admin.donasi.edit', compact('donasi'));
    }

    public function update(Request $request, $id)
    {
        $donasi = Donasi::findOrFail($id);

        $request->validate([
            'nama_donatur' => 'required|string|max:40',
            'nominal' => 'required|numeric|min:0',
            'tanggal_donasi' => 'required|date',
            'keterangan' => 'required|string',
            'id_transaksi' => 'required|integer|unique:donasi,id_transaksi,' . $donasi->id_donasi . ',id_donasi',
        ]);

        $donasi->update($request->all());

        return redirect()->route('donasi.index')->with('success', 'Data donasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $donasi = Donasi::findOrFail($id);
        $donasi->delete();

        return redirect()->route('donasi.index')->with('success', 'Data donasi berhasil dihapus!');
    }
}
