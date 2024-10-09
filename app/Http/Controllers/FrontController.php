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
use Illuminate\Support\Facades\Cache;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $cacheDuration = 60 * 60 * 6;

        $user = Cache::remember('user_latest', $cacheDuration, function () {
            return User::latest('id')->first();
        });

        $about = Cache::remember('about_latest', $cacheDuration, function () {
            return About::latest('id')->first();
        });

        $experience = Cache::remember('experience_all', $cacheDuration, function () {
            return Experience::orderBy('end_period', 'desc')->get();
        });

        $skills = Cache::remember('skills_all', $cacheDuration, function () {
            return Skill::orderBy('id', 'desc')->get();
        });

        $education = Cache::remember('education_all', $cacheDuration, function () {
            return Education::orderBy('start_year', 'desc')->get();
        });

        $projects = Cache::remember('projects_all', $cacheDuration, function () {
            return Project::orderBy('start_project', 'desc')->get();
        });

        $certificates = Cache::remember('certificates_all', $cacheDuration, function () {
            return Certificate::orderBy('publish_date', 'desc')->get();
        });

        $session = $request->session();

        if (!$session->has('visitor_web_porto')) {
            $agent = new Agent();
            $platform = $agent->platform();
            $robot = $agent->isRobot();

            if (!$robot) {
                $visitor = new Visitor();
                $visitor->ip = $request->ip();
                $visitor->visitor_os = $platform;
                $visitor->save();
            }
            $session->put('visitor_web_porto', true);
        }

        // Return the view with cached data
        return view('front_page', compact(
            'about',
            'experience',
            'education',
            'skills',
            'user',
            'projects',
            'certificates'
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
