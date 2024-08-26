<?php

namespace App\Http\Controllers\backend\magang;

use App\Http\Controllers\Controller;
use App\Models\dataKegiatan;
use App\Models\Instansi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class dataKegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $pageTitle = ucfirst(str_replace('-', ' ', end($segments)));

        return view('template.admin.magang.dataKegiatan.index', [
            'pageTitle' => $pageTitle,
            'dataKegiatan' => dataKegiatan::with(['user', 'instansi'])
                ->where('user_id', auth()->user()->id)
                ->get(),
        ]);
    }

    public function create()
    {
        return view('template.admin.magang.dataKegiatan.create', [
            'pageTitle' => 'Pengajuan Magang',
            'instansi' => Instansi::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'instansi_id' => 'required',
            'dok_pengajuan' => 'required',
        ]);
        
        // put dok_pengajuan to public folder
        $dok_pengajuan = $request->file('dok_pengajuan')->store('public/dok_pengajuan');

        $pengajuan_magang = new DataKegiatan();
        $pengajuan_magang->user_id = auth()->user()->id;
        $pengajuan_magang->instansi_id = $request->instansi_id;
        $pengajuan_magang->tanggal_mulai = Carbon::createFromFormat('m/d/Y', $request->tanggal_mulai)->format('Y-m-d');
        $pengajuan_magang->tanggal_selesai = Carbon::createFromFormat('m/d/Y', $request->tanggal_selesai)->format('Y-m-d');
        $pengajuan_magang->keterangan = $request->keterangan;
        $pengajuan_magang->dok_pengajuan = $dok_pengajuan;
        $pengajuan_magang->status = 0;

        $pengajuan_magang->save();

        return redirect()->route('data-kegiatan.index')->with('success', 'Pengajuan magang berhasil disimpan');
    }

    public function edit($id)
    {
        return view('template.admin.magang.dataKegiatan.edit', [
            'pageTitle' => 'Edit Pengajuan Magang',
            'instansi' => Instansi::latest()->get(),
            'dataKegiatan' => DataKegiatan::find($id),
        ]);
    }
}
