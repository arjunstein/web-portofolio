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
        $user = User::latest('id')->first();
        $about = About::latest('id')->first();
        $experience = Experience::orderBy('end_period', 'desc')->get();
        $skills = Skill::orderBy('percentase', 'desc')->get();
        $education = Education::orderBy('start_year', 'desc')->get();
        $projects = Project::orderBy('start_project', 'desc')->get();
        $certificates = Certificate::latest()->get();

        $agent = new Agent();
        $platform = $agent->platform();
        $robot = $agent->isRobot();

        if (!$robot) {
            $visitor = new Visitor;
            $visitor->ip = $request->ip();
            $visitor->visitor_os = $platform;
            $visitor->save();
        }

        return view('front_page', compact(
            'about',
            'experience',
            'education',
            'skills',
            'user',
            'projects',
            'certificates',
            'visitor'
        ));
    }

    public function linkedinClick(Request $request)
    {
        $ip = $request->ip();

        // Coba update entri yang sudah ada berdasarkan IP
        Visitor::latest('id')->where('ip', $ip)->first()->update([
            'socmed_visited' => 'Linkedin',
        ]);

        return response()->json(['message' => 'Visitor data saved successfully']);
    }

    public function gdriveClick(Request $request)
    {
        $ip = $request->ip();

        // Coba update entri yang sudah ada berdasarkan IP
        Visitor::latest('id')->where('ip', $ip)->first()->update([
            'socmed_visited' => 'CV Viewer',
        ]);

        return response()->json(['message' => 'Visitor data saved successfully']);
    }

    public function igClick(Request $request)
    {
        $ip = $request->ip();

        // Coba update entri yang sudah ada berdasarkan IP
        Visitor::latest('id')->where('ip', $ip)->first()->update([
            'socmed_visited' => 'Instagram',
        ]);

        return response()->json(['message' => 'Visitor data saved successfully']);
    }

    public function fbClick(Request $request)
    {
        $ip = $request->ip();

        // Coba update entri yang sudah ada berdasarkan IP
        Visitor::latest('id')->where('ip', $ip)->first()->update([
            'socmed_visited' => 'Facebook',
        ]);

        return response()->json(['message' => 'Visitor data saved successfully']);
    }

    public function waClick(Request $request)
    {
        $ip = $request->ip();

        // Coba update entri yang sudah ada berdasarkan IP
        Visitor::latest('id')->where('ip', $ip)->first()->update([
            'socmed_visited' => 'Whatsapp',
        ]);

        return response()->json(['message' => 'Visitor data saved successfully']);
    }

    public function twitterClick(Request $request)
    {
        $ip = $request->ip();

        // Coba update entri yang sudah ada berdasarkan IP
        Visitor::latest('id')->where('ip', $ip)->first()->update([
            'socmed_visited' => 'Twitter',
        ]);

        return response()->json(['message' => 'Visitor data saved successfully']);
    }
}
