<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('about.about_list', compact('abouts'));
    }

    /**
     * "About Us" sahifasini ko‘rsatish (foydalanuvchilar uchun)
     */
    public function show()
    {
        $about = About::first();
        return view('about', compact('about', 'teams'));
    }

    /**
     * Yangi About Us ma'lumotlarini yaratish uchun forma ko‘rsatish
     */
    public function create()
    {
        return view('about.create');
    }

    /**
     * "About Us" ma'lumotlarini saqlash
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'service_points' => 'required|integer|min:0',
            'engineers_workers' => 'required|integer|min:0',
            'happy_clients' => 'required|integer|min:0',
            'projects_completed' => 'required|integer|min:0',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about_images', 'public');
        }

        About::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'service_points' => $request->service_points,
            'engineers_workers' => $request->engineers_workers,
            'happy_clients' => $request->happy_clients,
            'projects_completed' => $request->projects_completed,
        ]);

        return redirect()->route('admin.about.index')->with('success', 'About Us ma\'lumotlari muvaffaqiyatli qo‘shildi!');
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('about.edit', compact('about'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'service_points' => 'required|integer|min:0',
            'engineers_workers' => 'required|integer|min:0',
            'happy_clients' => 'required|integer|min:0',
            'projects_completed' => 'required|integer|min:0',
        ]);

        $about = About::findOrFail($id);

        $imagePath = $about->image;
        if ($request->hasFile('image')) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('about_images', 'public');
        }

        $about->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'service_points' => $request->service_points,
            'engineers_workers' => $request->engineers_workers,
            'happy_clients' => $request->happy_clients,
            'projects_completed' => $request->projects_completed,
        ]);

        return redirect()->route('admin.about.index')->with('success', 'About Us ma\'lumotlari muvaffaqiyatli yangilandi!');
    }



    
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();

        return redirect()->route('admin.about.index')->with('success', 'About Us ma\'lumotlari muvaffaqiyatli o‘chirildi!');
    }

}
