<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function edit($id)
{
    $prodi = Prodi::findOrFail($id);
    return view('prodi.edit', compact('prodi'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required'
    ]);

    $prodi = Prodi::findOrFail($id);
    $prodi->update([
        'nama' => $request->nama
    ]);

    return redirect()->route('prodi')->with('success', 'Program Studi berhasil diupdated');
}
public function delete($id)
{
    $prodi = Prodi::findOrFail($id);
    $prodi->delete();

    return redirect()->route('prodi')->with('success', 'Data Program Studi berhasil dihapus');
}
}
