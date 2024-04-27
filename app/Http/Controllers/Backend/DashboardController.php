<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $about = About::latest('id')->first();

        return view('backend.dashboard.index', compact('about'));
    }
}
