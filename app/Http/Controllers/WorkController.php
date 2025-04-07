<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::all();
        return view('ourworks.list', compact('works'));
    }

    public function create()
    {
        return view('ourworks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'before_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'after_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $beforeImagePath = $request->file('before_image')->store('work_images', 'public');
        $afterImagePath = $request->file('after_image')->store('work_images', 'public');

        Work::create([
            'title' => $request->title,
            'before_image' => $beforeImagePath,
            'after_image' => $afterImagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.work.index')->with('success', 'Work added successfully!');
    }

    public function edit($id)
    {
        $work = Work::findOrFail($id);
        return view('ourworks.edit', compact('work'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'before_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'after_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $work = Work::findOrFail($id);

        $beforeImagePath = $work->before_image;
        $afterImagePath = $work->after_image;

        if ($request->hasFile('before_image')) {
            if ($beforeImagePath && Storage::disk('public')->exists($beforeImagePath)) {
                Storage::disk('public')->delete($beforeImagePath);
            }
            $beforeImagePath = $request->file('before_image')->store('work_images', 'public');
        }

        if ($request->hasFile('after_image')) {
            if ($afterImagePath && Storage::disk('public')->exists($afterImagePath)) {
                Storage::disk('public')->delete($afterImagePath);
            }
            $afterImagePath = $request->file('after_image')->store('work_images', 'public');
        }

        $work->update([
            'title' => $request->title,
            'before_image' => $beforeImagePath,
            'after_image' => $afterImagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.work.index')->with('success', 'Work updated successfully!');
    }

    public function destroy($id)
    {
        $work = Work::findOrFail($id);

        if ($work->before_image && Storage::disk('public')->exists($work->before_image)) {
            Storage::disk('public')->delete($work->before_image);
        }
        if ($work->after_image && Storage::disk('public')->exists($work->after_image)) {
            Storage::disk('public')->delete($work->after_image);
        }

        $work->delete();

        return redirect()->route('admin.work.index')->with('success', 'Work deleted successfully!');
    }
}
