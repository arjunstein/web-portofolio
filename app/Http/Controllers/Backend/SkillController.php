<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('created_at', 'desc')->get();
        $about = About::latest('id')->first();
        return view('backend.skills.index', compact('about', 'skills'));
    }

    public function create()
    {
        $about =
            About::latest('id')->first();
        return view('backend.skills.create', compact('about'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'skillName' => 'nullable|string|max:190',
            'percentase' => 'nullable|numeric|between:1,100'
        ]);

        try {
            $skill = new Skill;
            $skill->skillName = $request->skillName;
            $skill->percentase = $request->percentase;
            $skill->save();

            return redirect()->route('backend.skills')->with('success', 'Skill added successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong! Please try again');
        }
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        $about = About::latest('id')->first();
        return view('backend.skills.edit', compact('about', 'skill'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'skillName' => 'nullable|string|max:190',
            'percentase' => 'nullable|numeric|between:1,100'
        ]);
        try {
            $skill = Skill::findOrFail($id);
            $skill->update($request->all());
            return redirect()->route('backend.skills')->with('success', 'Skill updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong! Please try again');
        }
    }

    public function destroy($id)
    {
        try {
            $skill = Skill::findOrFail($id);
            $skill->delete();
            return redirect(route('backend.skills'))->with('success', 'Skill deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong! Please try again');
        }
    }
}
