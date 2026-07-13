<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BerkasPendaftaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
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

    public function show($id)
    {
        $pendaftar = Pendaftaran::with('berkas')->findOrFail($id);

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

    public function edit($id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);

        return view('admin.pendaftaran.edit', compact('pendaftar'));
    }

    public function update(Request $request, $id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);

        $request->validate([
            'nomor_pendaftaran' => 'required|string|max:255|unique:pendaftaran,nomor_pendaftaran,' . $pendaftar->id_pendaftaran . ',id_pendaftaran',
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

        $pendaftar->update($request->all());

        return redirect()->route('pendaftaran.index')->with('success', 'Data pendaftaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
        $pendaftar->delete();

        return redirect()->route('pendaftaran.index')->with('success', 'Data pendaftaran berhasil dihapus!');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Diverifikasi,Diterima,Ditolak',
        ]);

        $pendaftar = Pendaftaran::findOrFail($id);
        $pendaftar->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status pendaftar berhasil diperbarui!');
    }
}

