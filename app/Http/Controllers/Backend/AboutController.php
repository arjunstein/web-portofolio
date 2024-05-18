<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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
        try {
            $user = Auth::user();
            $about = About::findOrFail($id);
            return view('backend.about.edit', compact('user', 'about'));
        } catch (\Throwable $th) {
            return redirect('pages-error-404.html');
        }
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
                $image->storeAs('public/profile', $image->hashName());
                $about = About::findOrFail($id);

                //delete old image
                $path = storage_path('app/public/profile/' . $about->image);
                if (File::exists($path)) {
                    File::delete($path);
                }

                $about->birthday = $validatedData['birthday'];
                $about->title = $validatedData['title'];
                $about->gender = $validatedData['gender'];
                $about->summary = $validatedData['summary'];
                $about->phone = $validatedData['phone'];
                $about->country = $validatedData['country'];
                $about->address = $validatedData['address'];
                $about->whatsapp = $validatedData['whatsapp'];
                $about->linkedin = $validatedData['linkedin'];
                $about->instagram = $validatedData['instagram'];
                $about->whatsapp = $validatedData['whatsapp'];
                $about->twitter = $validatedData['twitter'];
                $about->facebook = $validatedData['facebook'];
                $about->image = $image->hashName();
                $about->update();
            } else {
                $about = About::findOrFail($id);
                $about->birthday = $validatedData['birthday'];
                $about->title = $validatedData['title'];
                $about->gender = $validatedData['gender'];
                $about->summary = $validatedData['summary'];
                $about->phone = $validatedData['phone'];
                $about->country = $validatedData['country'];
                $about->address = $validatedData['address'];
                $about->whatsapp = $validatedData['whatsapp'];
                $about->linkedin = $validatedData['linkedin'];
                $about->instagram = $validatedData['instagram'];
                $about->whatsapp = $validatedData['whatsapp'];
                $about->twitter = $validatedData['twitter'];
                $about->facebook = $validatedData['facebook'];
                $about->update();
            }

            return redirect()->route('backend.about.edit', ['id' => $about])->with('success', 'Profile successfully updated');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Profile was failed update');
        }
    }

    public function changePassword($id)
    {
        $about = About::findOrFail($id);
        return view('backend.about.change-password', compact('about'));
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        if ($request->old_password === $request->new_password) {
            return redirect()->back()->with("error", "New password cannot be the same as old password!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with("success", "Password berhasil diubah");
    }
}
