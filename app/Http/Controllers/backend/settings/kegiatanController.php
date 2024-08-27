<?php

namespace App\Http\Controllers\backend\settings;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\Kegiatan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class kegiatanController extends Controller
{
    public function index(Request $request)
    {
        $segments = $request->segments();
        $pageTitle = ucfirst(str_replace('-', ' ', end($segments)));
        return view('template.admin.settings.kegiatan.index', [
            'pageTitle' => $pageTitle,
            'dataKegiatan' => Kegiatan::with('instansi')->latest()->get(),
        ]);
    }

    public function create(Request $request)
    {
        $segments = $request->segments();
        $pageTitle = ucfirst(str_replace('-', ' ', end($segments)));
        return view('template.admin.settings.kegiatan.create', [
            'pageTitle' => $pageTitle,
            'daftarInstansi' => Instansi::orderBy('nama', 'asc')->get(),
            'daftarDospem' => User::role('dosen pembimbing')->orderBy('name', 'asc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        
        $kegiatan = new Kegiatan();
        $kegiatan->nama = $request->nama;
        $kegiatan->instansi_id = $request->instansi_id;
        $kegiatan->periode_akademik = $request->periode_akademik;
        $kegiatan->tanggal_mulai = Carbon::createFromFormat('m/d/Y', $request->tanggal_mulai)->format('Y-m-d');
        $kegiatan->tanggal_selesai = Carbon::createFromFormat('m/d/Y', $request->tanggal_selesai)->format('Y-m-d');
        $kegiatan->is_active = true;
        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Request $request, $id)
    {
        $segments = $request->segments();
        $pageTitle = ucfirst(str_replace('-', ' ', end($segments)));
        return view('template.admin.settings.kegiatan.edit', [
            'pageTitle' => $pageTitle,
            'daftarInstansi' => Instansi::orderBy('nama', 'asc')->get(),
            'kegiatan' => Kegiatan::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->nama = $request->nama;
        $kegiatan->instansi_id = $request->instansi_id;
        $kegiatan->periode_akademik = $request->periode_akademik;
        $kegiatan->tanggal_mulai = Carbon::createFromFormat('m/d/Y', $request->tanggal_mulai)->format('Y-m-d');
        $kegiatan->tanggal_selesai = Carbon::createFromFormat('m/d/Y', $request->tanggal_selesai)->format('Y-m-d');
        $kegiatan->is_active = true;
        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil dihapus');
    }
}
