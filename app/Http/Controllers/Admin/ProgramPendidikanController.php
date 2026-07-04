<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramPendidikan;
use Illuminate\Http\Request;

class ProgramPendidikanController extends Controller
{
    public function index()
    {
        $program = ProgramPendidikan::all();
        return view('admin.program.index', compact('program'));
    }

    public function create()
    {
        return view('admin.program.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

        ProgramPendidikan::create($request->all());
        return redirect()->route('program-pendidikan.index')->with('with', 'Program pendidikan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $program = ProgramPendidikan::findOrFail($id);
        return view('admin.program.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $program = ProgramPendidikan::findOrFail($id);
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

        $program->update($request->all());
        return redirect()->route('program-pendidikan.index')->with('success', 'Program pendidikan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $program = ProgramPendidikan::findOrFail($id);
        $program->delete();
        return redirect()->route('program-pendidikan.index')->with('success', 'Program pendidikan berhasil dihapus!');
    }
}