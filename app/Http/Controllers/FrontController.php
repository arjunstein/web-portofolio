<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $user = User::latest('id')->first();
        $about = About::latest('id')->first();
        $experience = Experience::orderBy('end_period', 'desc')->get();
        $skills = Skill::orderBy('percentase', 'desc')->get();
        $education = Education::orderBy('start_year', 'desc')->get();
        $projects = Project::orderBy('start_project', 'desc')->get();
        $certificates = Certificate::latest()->get();

        return view('front_page', compact('about', 'experience', 'education', 'skills', 'user', 'projects', 'certificates'));
    }
}
