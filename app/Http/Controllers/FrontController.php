<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        $about = About::latest('id')->first();
        $experience = Experience::orderBy('end_period', 'desc')->get();

        return view('front_page', compact('about', 'experience'));
    }
}
