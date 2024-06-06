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
        $visitor = Visitor::count();
        $visitorMonthlyData = Visitor::monthly(); // Mengambil data pengunjung per bulan untuk tahun saat ini

        // Menyiapkan array dengan jumlah pengunjung per bulan
        $monthlyCounts = array_fill(0, 12, 0); // Inisialisasi array dengan 12 elemen bernilai 0
        foreach ($visitorMonthlyData as $data) {
            $monthlyCounts[$data->month - 1] = $data->count; // Menempatkan data pada index yang sesuai
        }

        return view('backend.dashboard.index', compact(
            'about',
            'skills',
            'educations',
            'experience',
            'projects',
            'certificates',
            'visitor',
            'monthlyCounts'
        ));
    }
}
