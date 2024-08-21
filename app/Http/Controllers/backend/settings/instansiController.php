<?php

namespace App\Http\Controllers\backend\settings;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use Illuminate\Http\Request;

class instansiController extends Controller
{
    public function index(Request $request)
    {
        $segments = $request->segments();
        $pageTitle = ucfirst(end($segments));
        return view('template.admin.settings.instansi.index',[
            'pageTitle' => $pageTitle,
            'dataInstansi' => Instansi::orderBy('id', 'desc')->get()
        ]);
    }
}
