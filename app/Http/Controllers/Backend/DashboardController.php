<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $about = About::latest('id')->first();
        $skills = Skill::all();
        $educations = Education::all();
        $experience = Experience::all();
        return view('backend.dashboard.index', compact('about', 'skills', 'educations', 'experience'));
    }
}
