<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function index()
    {
        $about = About::latest('id')->first();
        $projects = Project::latest('id')->get();
        return view('backend.project.index', compact('about', 'projects'));
    }

    public function create()
    {
        $about = About::latest('id')->first();
        return view('backend.project.create', compact('about'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:300',
            'project_title' => 'required|string|max:100',
            'based' => 'required|string|max:100',
            'stack' => 'required|string|max:100',
            'start_project' => 'required|date',
            'end_project' => 'required|date',
            'description' => 'required|string|max:255',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/project', $image->hashName());

        $projects = new Project;
        $projects->image = $image->hashName();
        $projects->project_title = $request->project_title;
        $projects->based = $request->based;
        $projects->stack = $request->stack;
        $projects->start_project = $request->start_project;
        $projects->end_project = $request->end_project;
        $projects->description = $request->description;
        $projects->save();

        return redirect()->route('backend.project')->with('success', 'Project added succesfully');
    }

    public function edit($id)
    {
        $about = About::latest('id')->first();
        $projects = Project::find($id);
        return view('backend.project.edit', compact('about', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg|max:300',
            'project_title' => 'required|string|max:100',
            'based' => 'required|string|max:100',
            'stack' => 'required|string|max:100',
            'start_project' => 'required|date',
            'end_project' => 'required|date',
            'description' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            # upload new image
            $image = $request->file('image');
            $image->storeAs('public/project/', $image->hashName());

            # delete old image
            $projects = Project::findOrFail($id);
            $path = storage_path('app/public/project/' . $projects->image);
            if (File::exists($path)) {
                File::delete($path);
            }

            $projects = Project::findOrFail($id);
            $projects->image = $image->hashName();
            $projects->project_title = $request->project_title;
            $projects->based = $request->based;
            $projects->stack = $request->stack;
            $projects->start_project = $request->start_project;
            $projects->end_project = $request->end_project;
            $projects->description = $request->description;
            $projects->update();
        } else {
            $projects = Project::findOrFail($id);
            $projects->project_title = $request->project_title;
            $projects->based = $request->based;
            $projects->stack = $request->stack;
            $projects->start_project = $request->start_project;
            $projects->end_project = $request->end_project;
            $projects->description = $request->description;
            $projects->update();
        }

        return redirect()->route('backend.project')->with('success', 'Project updated successfully');
    }

    public function destroy($id)
    {
        $projects = Project::findOrFail($id);
        $path = storage_path('app/public/project/' . $projects->image);
        if (File::exists($path)) {
            File::delete($path);
        }
        $projects->delete();

        return redirect()->back()->with('success', 'Project deleted successfully');
    }
}
