<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $about = About::latest('id')->first();
        $experience = Experience::orderBy('start_period', 'desc')->get();
        return view('backend.experience.index', compact('about', 'experience'));
    }

    public function create()
    {
        $about = About::latest('id')->first();
        return view('backend.experience.create', compact('about'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:50',
            'title' => 'required|string|max:100',
            'start_period' => 'required|date',
            'end_period' => 'required|date',
            'jobdesc' => 'required|string|max:500',
            'last_salary' => 'required|numeric'
        ]);

        $experience = new Experience;
        $experience->fill($request->all());
        $experience->save();

        return redirect()->route('backend.experience')->with('success', 'Experience added succesfully!');
    }

    public function edit($id)
    {
        $about = About::latest('id')->first();
        $experience = Experience::findOrFail($id);

        return view('backend.experience.edit', compact('about', 'experience'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:50',
            'title' => 'required|string|max:100',
            'start_period' => 'required|date',
            'end_period' => 'required|date',
            'jobdesc' => 'required|string|max:500',
            'last_salary' => 'required|numeric'
        ]);

        $experience = Experience::findOrFail($id);
        $experience->update($request->all());

        return redirect()->route('backend.experience')->with('success', 'Experience updated succesfully!');
    }

    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return redirect()->route('backend.experience')->with('success', 'Experience deleted successfully');
    }
}
