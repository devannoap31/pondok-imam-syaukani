<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class StatusPendaftaranController extends Controller
{
    /**
     * Show form untuk cek status pendaftaran
     */
    public function show()
    {
        return view('frontend.status-pendaftaran.show');
    }

    /**
     * Cek status pendaftaran berdasarkan nomor registrasi
     */
    public function check(Request $request)
    {
        $request->validate([
            'nomor_pendaftaran' => 'required|string',
        ], [
            'nomor_pendaftaran.required' => 'Nomor Registrasi wajib diisi.',
        ]);

        $pendaftaran = Pendaftaran::where('nomor_pendaftaran', $request->nomor_pendaftaran)
            ->with('berkas')
            ->first();

        if (!$pendaftaran) {
            return back()
                ->withInput()
                ->with('error', 'Nomor Registrasi tidak ditemukan. Pastikan Anda memasukkan nomor dengan benar.');
        }

        return view('frontend.status-pendaftaran.detail', compact('pendaftaran'));
    }
}
