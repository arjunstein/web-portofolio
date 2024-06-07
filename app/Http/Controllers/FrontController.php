<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $agent = new Agent();
        $platform = $agent->platform();

        $user = User::latest('id')->first();
        $about = About::latest('id')->first();
        $experience = Experience::orderBy('end_period', 'desc')->get();
        $skills = Skill::orderBy('percentase', 'desc')->get();
        $education = Education::orderBy('start_year', 'desc')->get();
        $projects = Project::orderBy('start_project', 'desc')->get();
        $certificates = Certificate::latest()->get();
        $visitor = new Visitor;
        $visitor->ip = $request->ip();
        $visitor->visitor_os = $platform;
        $visitor->save();

        return view('front_page', compact('about', 'experience', 'education', 'skills', 'user', 'projects', 'certificates', 'visitor'));
    }
}
