<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::latest()->paginate(10);
        return view('settings.list', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'working_hours' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'instagram_url' => 'nullable|url',
            'telegram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'x_url' => 'nullable|url',
        ]);
    
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }
    
        Setting::create($validated);
    
        return redirect()->route('settings.index')->with('success', 'Setting created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('settings.edit',[
            'setting' => $setting,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);
        
        $request->validate([
            'site_name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'working_hours' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'nullable|string|max:255',
            'instagram_url' => 'nullable|url',
            'telegram_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'x_url' => 'nullable|url',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $setting->logo = $logoPath;
        }

        $setting->update([
            'site_name' => $request->site_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'working_hours' => $request->working_hours,
            'address' => $request->address,
            'instagram_url' => $request->instagram_url,
            'telegram_url' => $request->telegram_url,
            'youtube_url' => $request->youtube_url,
            'facebook_url' => $request->facebook_url,
            'x_url' => $request->x_url,
        ]);

        return redirect()->route('settings.index')->with('success', 'Sozlama yangilandi!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();

        return redirect()->route('settings.index')->with('success', 'Setting delete successfully!');
    }
}
