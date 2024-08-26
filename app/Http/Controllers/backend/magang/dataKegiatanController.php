<?php

namespace App\Http\Controllers\backend\magang;

use App\Http\Controllers\Controller;
use App\Models\dataKegiatan;
use App\Models\Instansi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
                ->latest()
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
            'dok_pengajuan' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'tanggal_mulai' => 'required|date_format:m/d/Y',
            'tanggal_selesai' => 'required|date_format:m/d/Y|after_or_equal:tanggal_mulai',
        ]);

        $instansi = Instansi::findOrFail($request->instansi_id);

        $tahunSekarang = now()->format('Y');

        $username = str_replace(' ', '-', auth()->user()->name);
        $instansiName = str_replace(' ', '-', $instansi->nama);
        $date = now()->format('Ymd');

        $filename = $tahunSekarang . '-' . $username . '-to-' . $instansiName . '-' . $date . '.' . $request->dok_pengajuan->extension();

        $filePath = null;
        if ($request->hasFile('dok_pengajuan')) {
            $file = $request->file('dok_pengajuan');
            $filePath = $file->storeAs('dok_pengajuan', $filename, 'public');
        }

        DataKegiatan::create([
            'user_id' => auth()->user()->id,
            'instansi_id' => $request->instansi_id,
            'tanggal_mulai' => Carbon::createFromFormat('m/d/Y', $request->tanggal_mulai)->format('Y-m-d'),
            'tanggal_selesai' => Carbon::createFromFormat('m/d/Y', $request->tanggal_selesai)->format('Y-m-d'),
            'keterangan' => $request->keterangan,
            'dok_pengajuan' => $filePath,
            'status' => 0,
        ]);

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
