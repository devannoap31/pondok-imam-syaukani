<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'nama_donatur'      => 'required|string|max:100',
            'institusi'         => 'nullable|string|max:100',
            'nominal'           => 'required|numeric|min:0',
            'tanggal_donasi'    => 'required|date',
            'keterangan'        => 'required|string',
            'id_transaksi'      => 'required|integer|unique:donasi,id_transaksi',
            'metode_pembayaran' => 'nullable|string|max:100',
            'bukti_pembayaran'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $buktiPath = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPath = $request->file('bukti_pembayaran')->store('bukti_donasi', 'local');
        }

        Donasi::create([
            'nama_donatur'      => $request->nama_donatur,
            'institusi'         => $request->institusi,
            'nominal'           => $request->nominal,
            'tanggal_donasi'    => $request->tanggal_donasi,
            'keterangan'        => $request->keterangan,
            'id_transaksi'      => $request->id_transaksi,
            'metode_pembayaran' => $request->metode_pembayaran ?? 'Transfer Bank BSI',
            'bukti_pembayaran'  => $buktiPath,
        ]);

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
            'nama_donatur'      => 'required|string|max:100',
            'institusi'         => 'nullable|string|max:100',
            'nominal'           => 'required|numeric|min:0',
            'tanggal_donasi'    => 'required|date',
            'keterangan'        => 'required|string',
            'id_transaksi'      => 'required|integer|unique:donasi,id_transaksi,' . $donasi->id_donasi . ',id_donasi',
            'metode_pembayaran' => 'nullable|string|max:100',
            'bukti_pembayaran'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $data = [
            'nama_donatur'      => $request->nama_donatur,
            'institusi'         => $request->institusi,
            'nominal'           => $request->nominal,
            'tanggal_donasi'    => $request->tanggal_donasi,
            'keterangan'        => $request->keterangan,
            'id_transaksi'      => $request->id_transaksi,
            'metode_pembayaran' => $request->metode_pembayaran ?? $donasi->metode_pembayaran,
        ];

        if ($request->hasFile('bukti_pembayaran')) {
            if ($donasi->bukti_pembayaran) {
                if (Storage::disk('local')->exists($donasi->bukti_pembayaran)) {
                    Storage::disk('local')->delete($donasi->bukti_pembayaran);
                } elseif (Storage::disk('public')->exists($donasi->bukti_pembayaran)) {
                    Storage::disk('public')->delete($donasi->bukti_pembayaran);
                }
            }
            $data['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_donasi', 'local');
        }

        $donasi->update($data);

        return redirect()->route('donasi.index')->with('success', 'Data donasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $donasi = Donasi::findOrFail($id);

        if ($donasi->bukti_pembayaran) {
            if (Storage::disk('local')->exists($donasi->bukti_pembayaran)) {
                Storage::disk('local')->delete($donasi->bukti_pembayaran);
            } elseif (Storage::disk('public')->exists($donasi->bukti_pembayaran)) {
                Storage::disk('public')->delete($donasi->bukti_pembayaran);
            }
        }

        $donasi->delete();

        return redirect()->route('donasi.index')->with('success', 'Data donasi berhasil dihapus!');
    }

    /**
     * Tampilkan / stream file bukti pembayaran secara privat khusus Admin.
     */
    public function bukti($id)
    {
        $donasi = Donasi::findOrFail($id);

        if (!$donasi->bukti_pembayaran) {
            abort(404, 'Bukti donasi tidak ditemukan.');
        }

        // Cek disk privat (local) terlebih dahulu
        if (Storage::disk('local')->exists($donasi->bukti_pembayaran)) {
            return Storage::disk('local')->response($donasi->bukti_pembayaran);
        }

        // Fallback cek disk public jika ada file lama
        if (Storage::disk('public')->exists($donasi->bukti_pembayaran)) {
            return Storage::disk('public')->response($donasi->bukti_pembayaran);
        }

        abort(404, 'File bukti fisik tidak ditemukan pada server.');
    }
}
