<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RekeningBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RekeningBankController extends Controller
{
    public function index()
    {
        $rekenings = RekeningBank::orderBy('urutan')->latest('id_rekening')->get();
        return view('admin.rekening_bank.index', compact('rekenings'));
    }

    public function create()
    {
        return view('admin.rekening_bank.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bank' => 'required|string|max:50',
            'kode_bank' => 'nullable|string|max:10',
            'nomor_rekening' => 'required|string|max:40',
            'atas_nama' => 'required|string|max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'urutan' => 'required|integer|min:1',
            'aktif' => 'required|boolean',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('bank_logo', 'public');
        }

        RekeningBank::create([
            'nama_bank' => $request->nama_bank,
            'kode_bank' => $request->kode_bank,
            'nomor_rekening' => $request->nomor_rekening,
            'atas_nama' => $request->atas_nama,
            'logo' => $logoPath,
            'urutan' => $request->urutan,
            'aktif' => $request->aktif,
        ]);

        return redirect()->route('rekening-bank.index')->with('success', 'Rekening bank berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $rekening = RekeningBank::findOrFail($id);
        return view('admin.rekening_bank.edit', compact('rekening'));
    }

    public function update(Request $request, $id)
    {
        $rekening = RekeningBank::findOrFail($id);

        $request->validate([
            'nama_bank' => 'required|string|max:50',
            'kode_bank' => 'nullable|string|max:10',
            'nomor_rekening' => 'required|string|max:40',
            'atas_nama' => 'required|string|max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'urutan' => 'required|integer|min:1',
            'aktif' => 'required|boolean',
        ]);

        $data = [
            'nama_bank' => $request->nama_bank,
            'kode_bank' => $request->kode_bank,
            'nomor_rekening' => $request->nomor_rekening,
            'atas_nama' => $request->atas_nama,
            'urutan' => $request->urutan,
            'aktif' => $request->aktif,
        ];

        if ($request->hasFile('logo')) {
            if ($rekening->logo && Storage::disk('public')->exists($rekening->logo)) {
                Storage::disk('public')->delete($rekening->logo);
            }
            $data['logo'] = $request->file('logo')->store('bank_logo', 'public');
        }

        $rekening->update($data);

        return redirect()->route('rekening-bank.index')->with('success', 'Rekening bank berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $rekening = RekeningBank::findOrFail($id);

        if ($rekening->logo && Storage::disk('public')->exists($rekening->logo)) {
            Storage::disk('public')->delete($rekening->logo);
        }

        $rekening->delete();

        return redirect()->route('rekening-bank.index')->with('success', 'Rekening bank berhasil dihapus!');
    }
}
