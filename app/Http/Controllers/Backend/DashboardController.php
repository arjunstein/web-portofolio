<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class DashboardController extends Controller
{
    public function index()
    {
        $about = About::latest('id')->first();
        $skills = Skill::all();
        $educations = Education::all();
        $experience = Experience::all();
        $projects = Project::all();
        $certificates = Certificate::all();
        $visitorMonthlyData = Visitor::monthlyVisitor(); // Mengambil data pengunjung per bulan untuk tahun saat ini

        // Menyiapkan array dengan jumlah pengunjung per bulan
        $monthlyCounts = array_fill(0, 12, 0); // Inisialisasi array dengan 12 elemen bernilai 0
        foreach ($visitorMonthlyData as $data) {
            $monthlyCounts[$data->month - 1] = $data->count; // Menempatkan data pada index yang sesuai
        }

        // Mengambil data pengunjung berdasarkan sistem operasi
        $visitorOsData = Visitor::monthlyVisitorOs();
        $osLabels = $visitorOsData->pluck('visitor_os');
        $osCounts = $visitorOsData->pluck('count');
        $socmedVisitorData = Visitor::monthlySocmedVisitor();
        $socmedLabel = $socmedVisitorData->pluck('socmed_visited');
        $socmedCounts = $socmedVisitorData->pluck('count');

        return view('backend.dashboard.index', compact(
            'about',
            'skills',
            'educations',
            'experience',
            'projects',
            'certificates',
            'monthlyCounts',
            'osLabels',
            'osCounts',
            'socmedLabel',
            'socmedCounts'
        ));
    }
}
