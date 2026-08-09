<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BerkasPendaftaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PendaftaranController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('admin.only', except: ['index', 'show']),
        ];
    }

    public function index()
    {
        $pendaftar = Pendaftaran::with('berkas')->latest('created_at')->get();

        return view('admin.pendaftaran.index', compact('pendaftar'));
    }

    public function create()
    {
        return view('admin.pendaftaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_pendaftaran' => 'required|string|max:255|unique:pendaftaran,nomor_pendaftaran',
            'nama_lengkap' => 'required|string|max:40',
            'tempat_lahir' => 'required|string|max:40',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'required|string',
            'nomor_hp' => 'required|string|max:40',
            'nama_ortu' => 'required|string|max:40',
            'pekerjaan_ortu' => 'required|string|max:40',
            'status' => 'required|in:Diverifikasi,Diterima,Ditolak',
        ]);

        Pendaftaran::create($request->all());

        return redirect()->route('pendaftaran.index')->with('success', 'Data pendaftaran berhasil ditambahkan!');
    }

    public function show(Pendaftaran $pendaftaran)
    {
        $pendaftar = $pendaftaran->load('berkas');

        return view('admin.pendaftaran.show', compact('pendaftar'));
    }

    public function viewBerkas($pendaftaranId, $berkasId)
    {
        $pendaftar = Pendaftaran::findOrFail($pendaftaranId);
        $berkas = $pendaftar->berkas()->whereKey($berkasId)->firstOrFail();

        return Storage::disk('public')->response($berkas->file_path, $berkas->jenis_berkas . '_' . $pendaftar->nomor_pendaftaran);
    }

    public function downloadBerkas($pendaftaranId, $berkasId)
    {
        $pendaftar = Pendaftaran::findOrFail($pendaftaranId);
        $berkas = $pendaftar->berkas()->whereKey($berkasId)->firstOrFail();

        return Storage::disk('public')->download($berkas->file_path, $berkas->jenis_berkas . '_' . $pendaftar->nomor_pendaftaran);
    }

    public function edit(Pendaftaran $pendaftaran)
    {
        $pendaftar = $pendaftaran;

        return view('admin.pendaftaran.edit', compact('pendaftar'));
    }

    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $request->validate([
            'status' => 'required|in:Diverifikasi,Diterima,Ditolak',
        ], [
            'status.required' => 'Status pendaftaran wajib dipilih.',
            'status.in' => 'Pilihan status pendaftaran tidak valid.',
        ]);

        $pendaftaran->update([
            'status' => $request->status,
        ]);

        return redirect()->route('pendaftaran.index')->with('success', 'Status pendaftaran berhasil diperbarui!');
    }

    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();

        return redirect()->route('pendaftaran.index')->with('success', 'Data pendaftaran berhasil dihapus!');
    }

    public function updateStatus(Request $request, Pendaftaran $pendaftaran)
    {
        $request->validate([
            'status' => 'required|in:Diverifikasi,Diterima,Ditolak',
        ]);

        $pendaftaran->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status pendaftar berhasil diperbarui!');
    }
}
