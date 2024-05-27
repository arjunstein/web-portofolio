<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CertificateController extends Controller
{
    public function index()
    {
        $about = About::latest('id')->first();
        $certificates = Certificate::orderBy('publish_date', 'desc')->get();
        return view('backend.certificate.index', compact('about', 'certificates'));
    }

    public function create()
    {
        $about = About::latest('id')->first();
        return view('backend.certificate.create', compact('about'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:512',
            'certificate_title' => 'required|string|max:120',
            'publish_date' => 'required|date',
            'publisher' => 'required|max:100',
            'expired' => 'nullable|date',
            'certificate_description' => 'required|max:255',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/certificates', $image->hashName());

        $certificates = new Certificate;
        $certificates->image = $image->hashName();
        $certificates->certificate_title = $request->certificate_title;
        $certificates->publish_date = $request->publish_date;
        $certificates->publisher = $request->publisher;
        $certificates->expired = $request->expired;
        $certificates->certificate_description = $request->certificate_description;
        $certificates->save();

        return redirect()->route('backend.certificate')->with('success', 'Certificate added succcesfully');
    }

    public function edit($id)
    {
        $about = About::latest('id')->first();
        $certificates = Certificate::findOrFail($id);

        return view('backend.certificate.edit', compact('about', 'certificates'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg|max:512',
            'certificate_title' => 'required|string|max:120',
            'publish_date' => 'required|date',
            'publisher' => 'required|max:100',
            'expired' => 'nullable|date',
            'certificate_description' => 'required|max:255',
        ]);

        if ($request->hasFile('image')) {
            # upload new image
            $image = $request->file('image');
            $image->storeAs('public/certificates/', $image->hashName());
            # delete old image
            $certificates = Certificate::findOrFail($id);
            $path = storage_path('app/public/certificates/' . $certificates->image);
            if (File::exists($path)) {
                File::delete($path);
            }
            $certificates = Certificate::findOrFail($id);
            $certificates->image = $image->hashName();
            $certificates->certificate_title = $request->certificate_title;
            $certificates->publish_date = $request->publish_date;
            $certificates->publisher = $request->publisher;
            $certificates->expired = $request->expired;
            $certificates->certificate_description = $request->certificate_description;
            $certificates->update();
        } else {
            $certificates = Certificate::findOrFail($id);
            $certificates->certificate_title = $request->certificate_title;
            $certificates->publish_date = $request->publish_date;
            $certificates->publisher = $request->publisher;
            $certificates->expired = $request->expired;
            $certificates->certificate_description = $request->certificate_description;
            $certificates->update();
        }

        return redirect()->route('backend.certificate')->with('success', 'Certificate updated successfully');
    }

    public function destroy($id)
    {
        $certificates = Certificate::findOrFail($id);
        $path = storage_path('app/public/certificates/' . $certificates->image);
        if (File::exists($path)) {
            File::delete($path);
        }
        $certificates->delete();
        return redirect()->route('backend.certificate')->with('success', 'Certificate deleted successfully');
    }
}
