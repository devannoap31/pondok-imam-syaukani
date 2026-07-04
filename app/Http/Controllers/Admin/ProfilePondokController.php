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

    public function update(Request $request, $id)
    {
        $profile = ProfilePondok::findOrFail($id);

        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
            'sejarah' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($profile->logo && Storage::disk('public')->exists($profile->logo)) {
                Storage::disk('public')->delete($profile->logo);
            }
            $logoPath = $request->file('logo')->store('profile', 'public');
            $profile->logo = $logoPath;
        }

        $profile->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
            'sejarah' => $request->sejarah,
        ]);

        return redirect()->route('profile-pondok.index')->with('success', 'Profil Pondok berhasil diperbarui!');
    }
}