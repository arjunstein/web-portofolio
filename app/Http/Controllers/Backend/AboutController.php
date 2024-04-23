<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        $about = About::findOrFail($id);
        return view('backend.about.index', compact('user', 'about'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $about = About::findOrFail($id);
        return view('backend.about.edit', compact('user', 'about'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'birthday' => 'nullable|date|before_or_equal:today',
            'title' => 'nullable|string',
            'gender' => 'nullable|in:male,female',
            'summary' => 'nullable|string|max:1024|min:6',
            'phone' => 'nullable|numeric',
            'country' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:200',
            'whatsapp' => 'nullable|numeric',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:512',
        ]);

        try {
            // Check if image is uploaded
            if ($request->hasFile('image')) {
                // Store the image
                $image = $request->file('image');
                $imagePath = $image->storeAs('public/images/profile', $image->hashName());
                // Update the image path in validated data
                $validatedData['image'] = $imagePath;
            }
            $about = About::findOrFail($id);
            $about->fill($validatedData);
            $about->save();
            return redirect()->route('backend.about.edit', ['id' => $about])->with('success', 'Profile successfully updated');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Profile was failed update');
        }
    }

    public function changePassword(User $user)
    {
        return view('backend.about.change-password', compact('user'));
    }
}
