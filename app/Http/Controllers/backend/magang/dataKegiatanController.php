<?php

namespace App\Http\Controllers\backend\magang;

use App\Http\Controllers\Controller;
use App\Models\dataKegiatan;
use App\Models\Instansi;
use App\Models\Kegiatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
            'kegiatan' => Kegiatan::latest()->get(),
            'instansi' => Instansi::latest()->get(),
        ]);
    }

    public function getKegiatanDetails(Request $request)
    {
        // Ambil detail kegiatan berdasarkan ID
        $kegiatan = Kegiatan::findOrFail($request->kegiatan_id);
        $instansi = Instansi::findOrFail($kegiatan->instansi_id);

        // Kembalikan response JSON yang berisi detail kegiatan
        return response()->json([
            'instansi_id' => $instansi->id,
            'instansi_nama' => $instansi->nama,
            'tanggal_mulai' => $kegiatan->tanggal_mulai->format('m/d/Y'),
            'tanggal_selesai' => $kegiatan->tanggal_selesai->format('m/d/Y'),
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

        // Generate filename and store dokumen pengajuan
        $tahunSekarang = now()->format('Y');
        $username = Str::slug(auth()->user()->name);
        $instansiName = Str::slug($instansi->nama);
        $date = now()->format('Ymd');
        $filename = $tahunSekarang . '-' . $username . '-to-' . $instansiName . '-' . $date . '.' . $request->dok_pengajuan->getClientOriginalExtension();

        $filePath = $request->file('dok_pengajuan')->storeAs('dok_pengajuan', $filename, 'public');

        // Store data kegiatan
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
            'dataKegiatan' => DataKegiatan::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validation rules
        $request->validate([
            'instansi_id' => 'required',
            'dok_pengajuan' => 'file|mimes:pdf,doc,docx|max:2048',
            'tanggal_mulai' => 'required|date_format:m/d/Y',
            'tanggal_selesai' => 'required|date_format:m/d/Y|after_or_equal:tanggal_mulai',
        ]);

        // Retrieve the existing DataKegiatan record
        $dataKegiatan = DataKegiatan::findOrFail($id);

        // Retrieve the related instansi
        $instansi = Instansi::findOrFail($request->instansi_id);

        // File handling: Only generate filename and store if a new file is uploaded
        $filePath = $dataKegiatan->dok_pengajuan; // Default to the existing file path
        if ($request->hasFile('dok_pengajuan')) {
            $file = $request->file('dok_pengajuan');

            $tahunSekarang = now()->format('Y');
            $username = Str::slug(auth()->user()->name); // Sanitize username
            $instansiName = Str::slug($instansi->nama); // Sanitize instansi name
            $date = now()->format('Ymd');

            $filename = $tahunSekarang . '-' . $username . '-to-' . $instansiName . '-' . $date . '.' . $file->getClientOriginalExtension();

            // Store the file and update the file path
            $filePath = $file->storeAs('dok_pengajuan', $filename, 'public');
        }

        // Update the DataKegiatan record
        $dataKegiatan->update([
            'instansi_id' => $request->instansi_id,
            'tanggal_mulai' => Carbon::createFromFormat('m/d/Y', $request->tanggal_mulai)->format('Y-m-d'),
            'tanggal_selesai' => Carbon::createFromFormat('m/d/Y', $request->tanggal_selesai)->format('Y-m-d'),
            'keterangan' => $request->keterangan,
            'dok_pengajuan' => $filePath,
            'status' => 0,
        ]);

        // Redirect with success message
        return redirect()->route('data-kegiatan.index')->with('success', 'Pengajuan magang berhasil diubah');
    }

    public function destroy($id)
    {
        $dataKegiatan = DataKegiatan::findOrFail($id);
        $dataKegiatan->delete();

        return redirect()->route('data-kegiatan.index')->with('success', 'Pengajuan magang berhasil dihapus');
    }
}
