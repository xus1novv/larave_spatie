<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Xizmatlar ro'yxatini ko'rsatish
    public function index()
    {
        $services = Service::all();
        return view('service.list', compact('services'));
    }

    // Xizmat yaratish formasi
    public function create()
    {
        return view('service.create');
    }

    // Yangi xizmat qo'shish
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'nullable|integer|min:1',
            'is_active' => 'boolean',
        ]);

        Service::create($request->all());
        return redirect()->route('service.index')->with('success', 'Xizmat muvaffaqiyatli qo\'shildi');
    }


    // Xizmatni tahrirlash formasi
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('service.edit', compact('service'));
    }

    // Xizmatni yangilash
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|numeric|min:0',
            'duration' => 'nullable|integer|min:1',
            'is_active' => 'boolean',
        ]);

        $service->update($request->all());
        return redirect()->route('service.index')->with('success', 'Xizmat muvaffaqiyatli yangilandi');
    }

    // Xizmatni o'chirish
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Xizmat muvaffaqiyatli o\'chirildi');
    }
}
