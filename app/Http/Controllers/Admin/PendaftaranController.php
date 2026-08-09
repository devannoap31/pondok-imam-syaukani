<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BerkasPendaftaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\StatusUpdatedNotification;

class PendaftaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.only')->except(['index', 'show']);
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
        $filePath = Storage::disk('public')->path($berkas->file_path);

        return response()->file(
            $filePath,
            [
                'Content-Disposition' => 'inline; filename="' . $berkas->jenis_berkas . '_' . $pendaftar->nomor_pendaftaran . '"',
            ]
        );
    }

    public function downloadBerkas($pendaftaranId, $berkasId)
    {
        $pendaftar = Pendaftaran::findOrFail($pendaftaranId);
        $berkas = $pendaftar->berkas()->whereKey($berkasId)->firstOrFail();
        $filePath = Storage::disk('public')->path($berkas->file_path);

        return response()->download(
            $filePath,
            $berkas->jenis_berkas . '_' . $pendaftar->nomor_pendaftaran
        );
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

        if ($pendaftaran->email) {
            Mail::to($pendaftaran->email)->send(new StatusUpdatedNotification(
                $pendaftaran->nama_lengkap,
                $pendaftaran->nomor_pendaftaran,
                $pendaftaran->status
            ));
        }

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

        if ($pendaftaran->email) {
            Mail::to($pendaftaran->email)->send(new StatusUpdatedNotification(
                $pendaftaran->nama_lengkap,
                $pendaftaran->nomor_pendaftaran,
                $pendaftaran->status
            ));
        }

        return redirect()->back()->with('success', 'Status pendaftar berhasil diperbarui!');
    }
}
