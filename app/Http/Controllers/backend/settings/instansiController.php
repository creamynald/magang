<?php

namespace App\Http\Controllers\backend\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instansi;

class instansiController extends Controller
{
    public function index(Request $request)
    {
        $segments = $request->segments();
        $pageTitle = ucfirst(str_replace('-', ' ', end($segments)));
        return view('template.admin.settings.instansi.index', [
            'pageTitle' => $pageTitle,
            'dataInstansi' => Instansi::orderBy('id', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('template.admin.settings.instansi.create', [
            'pageTitle' => 'Tambah Instansi',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $instansi = new Instansi();
        $instansi->nama = $request->nama;
        $instansi->alamat = $request->alamat;
        $instansi->kode_pos = $request->kode_pos;
        $instansi->surel = $request->surel;
        $instansi->laman_web = $request->laman_web;
        $instansi->is_active = true;
        $instansi->save();
        return redirect()->route('instansi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('template.admin.settings.instansi.edit', [
            'pageTitle' => 'Edit Instansi',
            'instansi' => Instansi::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $instansi = Instansi::find($id);
        $instansi->nama = $request->nama;
        $instansi->alamat = $request->alamat;
        $instansi->kode_pos = $request->kode_pos;
        $instansi->surel = $request->surel;
        $instansi->laman_web = $request->laman_web;
        $instansi->save();
        return redirect()->route('instansi.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $instansi = Instansi::find($id);
        $instansi->delete();
        return redirect()->route('instansi.index')->with('success', 'Data berhasil dihapus');
    }
}
