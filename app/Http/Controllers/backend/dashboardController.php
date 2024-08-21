<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(Request $request)
    {
        $segments = $request->segments();
        $pageTitle = ucfirst(end($segments));
        return view('template.admin.dashboard',[
            'pageTitle' => $pageTitle
        ]);
    }
}
