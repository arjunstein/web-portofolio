<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $about = About::latest('id')->first();
        $education = Education::orderBy('start_year', 'desc')->get();
        return view('backend.education.index', compact('about', 'education'));
    }

    public function create()
    {
        $about = About::latest('id')->first();
        return view('backend.education.create', compact('about'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'school' => 'required|string|min:3|max:100',
            'major' => 'required|string|max:100',
            'title' => 'required|string|max:100',
            'gpa' => 'required|numeric|between:0.00,99.99',
            'start_year' => 'required|numeric|between:1970,2030',
            'end_year' => 'required|numeric|between:1970,2045',
        ]);

        if ($request->end_year < $request->start_year) {
            return redirect()->back()->with('error', 'The end year should not be less than the start year');
        }

        $education = new Education;
        $education->fill($request->all());
        $education->save();

        return redirect()->route('backend.education')->with('success', 'Education added succesfully');
    }

    public function edit($id)
    {
        $about = About::latest('id')->first();
        $education = Education::findOrFail($id);

        return view('backend.education.edit', compact('about', 'education'));
    }

    public function update(Request $request, $id)
    {
        # code...
        $request->validate([
            'school' => 'required|string|min:3|max:100',
            'major' => 'required|string|max:100',
            'title' => 'required|string|max:100',
            'gpa' => 'required|numeric|between:0.00,99.99',
            'start_year' => 'required|numeric|between:1970,2030',
            'end_year' => 'required|numeric|between:1970,2045',
        ]);

        if ($request->end_year < $request->start_year) {
            return redirect()->back()->with('error', 'The end year should not be less than the start year');
        }

        try {
            $education = Education::findOrFail($id);
            $education->update($request->all());

            return redirect()->route('backend.education')->with('success', 'Education updated succesfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Something went wrong! Please try again');
        }
    }

    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()->back()->with('success', 'Education deleted succesfully!');
    }
}
