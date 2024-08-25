<?php

namespace App\Http\Controllers\backend\settings;

use App\Http\Controllers\Controller;
use App\Models\bidangInstansi;
use App\Models\Instansi;
use Illuminate\Http\Request;

class bidangInstansiController extends Controller
{
    public function index(Request $request)
    {
        $segments = $request->segments();
        $pageTitle = ucfirst(end($segments));
        return view('template.admin.settings.bidangInstansi.index', [
            'pageTitle' => $pageTitle,
            'dataBidInstansi' => bidangInstansi::orderBy('instansi_id', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('template.admin.settings.bidangInstansi.create', [
            'instansi' => Instansi::orderBy('nama', 'asc')->get(),
            'pageTitle' => 'Tambah Bidang Instansi',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'instansi_id' => 'required',
            'nama' => 'required',
        ]);

        $bidangInstansi = new bidangInstansi();
        $bidangInstansi->instansi_id = $request->instansi_id;
        $bidangInstansi->nama = $request->nama;
        $bidangInstansi->nama_penanggung_jawab = $request->nama_penanggung_jawab;
        $bidangInstansi->nip = $request->nip;
        $bidangInstansi->telepon = $request->telepon;
        $bidangInstansi->is_active = true;
        $bidangInstansi->save();
        return to_route('bidang-instansi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('template.admin.settings.bidangInstansi.edit', [
            'instansi' => Instansi::orderBy('nama', 'asc')->get(),
            'pageTitle' => 'Edit Bidang Instansi',
            'bidangInstansi' => bidangInstansi::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'instansi_id' => 'required',
            'nama' => 'required',
        ]);

        $bidangInstansi = bidangInstansi::find($id);
        $bidangInstansi->instansi_id = $request->instansi_id;
        $bidangInstansi->nama = $request->nama;
        $bidangInstansi->nama_penanggung_jawab = $request->nama_penanggung_jawab;
        $bidangInstansi->nip = $request->nip;
        $bidangInstansi->telepon = $request->telepon;
        $bidangInstansi->is_active = true;
        $bidangInstansi->save();
        return to_route('bidang-instansi.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $bidangInstansi = bidangInstansi::find($id);
        $bidangInstansi->delete();
        return to_route('bidang-instansi.index')->with('success', 'Data berhasil dihapus');
    }
}
