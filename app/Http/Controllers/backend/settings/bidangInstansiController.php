<?php

namespace App\Http\Controllers\backend\settings;

use App\Http\Controllers\Controller;
use App\Models\bidangInstansi;
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

    public function destroy($id)
    {
        $bidangInstansi = bidangInstansi::find($id);
        $bidangInstansi->delete();
        return to_route('bidang-instansi.index')->with('success', 'Data berhasil dihapus');
    }
}
