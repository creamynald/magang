<?php

namespace App\Http\Controllers\backend\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instansi;
use App\Models\User;

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
            'pembimbing' => User::role('pembimbing')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_instansi' => 'required',
        ]);

        $instansi = new Instansi();
        $instansi->nama_instansi = $request->nama_instansi;
        $instansi->nama_kegiatan = $request->nama_kegiatan;
        $instansi->user_id = $request->user_id;
        $instansi->alamat = $request->alamat;
        $instansi->surel = $request->surel;
        $instansi->laman_web = $request->laman_web;
        $instansi->telp = $request->telp;
        $instansi->is_active = true;
        $instansi->save();
        return redirect()->route('instansi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('template.admin.settings.instansi.edit', [
            'pageTitle' => 'Edit Instansi',
            'instansi' => Instansi::find($id),
            'pembimbing' => User::role('pembimbing')->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_instansi' => 'required',
        ]);

        $instansi = Instansi::find($id);
        $instansi->nama_instansi = $request->nama_instansi;
        $instansi->nama_kegiatan = $request->nama_kegiatan;
        $instansi->user_id = $request->user_id;
        $instansi->alamat = $request->alamat;
        $instansi->surel = $request->surel;
        $instansi->laman_web = $request->laman_web;
        $instansi->telp = $request->telp;
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
