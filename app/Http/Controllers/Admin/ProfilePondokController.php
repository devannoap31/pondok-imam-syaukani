<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilePondok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilePondokController extends Controller
{
    public function index()
    {
        $profile = ProfilePondok::first(); // Mengambil data profile pertama/tunggal
        return view('admin.profile.index', compact('profile'));
    }

    public function update(Request $request, ProfilePondok $profil_pondok)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
            'sejarah' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($profil_pondok->logo && Storage::disk('public')->exists($profil_pondok->logo)) {
                Storage::disk('public')->delete($profil_pondok->logo);
            }
            $logoPath = $request->file('logo')->store('profile', 'public');
            $profil_pondok->logo = $logoPath;
        }

        $profil_pondok->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
            'sejarah' => $request->sejarah,
        ]);

        return redirect()->route('profil-pondok.index')->with('success', 'Profil Pondok berhasil diperbarui!');
    }
}
