<?php

namespace App\Http\Controllers\backend\settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(Request $request)
    {
        $segments = $request->segments();
        $pageTitle = ucfirst(str_replace('-', ' ', end($segments)));
        return view('template.admin.settings.users.index', [
            'pageTitle' => $pageTitle,
            'dataUsers' => User::latest()->get(),
        ]);
    }
}
