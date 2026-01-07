<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function store(Request $request)
    {
        $about = About::first();

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'nullable|url',
            'point_1' => 'nullable|string',
            'point_2' => 'nullable|string',
            'point_3' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($about && $about->image && file_exists(public_path('uploads/about/' . $about->image))) {
                unlink(public_path('uploads/about/' . $about->image));
            }
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/about/'), $filename);
            $data['image'] = $filename;
        }

        if ($about) {
            $about->update($data);
        } else {
            About::create($data);
        }

        return redirect()->back()->with('success', 'About section updated successfully.');
    }
}
