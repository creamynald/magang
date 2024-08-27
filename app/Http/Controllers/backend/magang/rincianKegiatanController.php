<?php

namespace App\Http\Controllers\backend\magang;

use App\Http\Controllers\Controller;
use App\Models\rincianKegiatan;
use Illuminate\Http\Request;

class rincianKegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $pageTitle = ucfirst(str_replace('-', ' ', end($segments)));

        return view('template.admin.magang.rincianKegiatan.index', [
            'pageTitle' => $pageTitle,
            'rincianKegiatan' => rincianKegiatan::with('kegiatan')
                ->where('user_id', auth()->user()->id)
                ->latest()
                ->get(),
        ]);
    }
}
