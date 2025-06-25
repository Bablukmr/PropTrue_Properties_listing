<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacilityController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type', 'amenity');
        $facilities = Facility::where('type', $type)->get();

        return view('admin.facilities.index', compact('facilities', 'type'));
    }

    public function create()
    {
        $type = request()->get('type', 'amenity');
        return view('admin.facilities.create', compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'type' => 'required|in:amenity,feature',
        ]);

        Facility::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'type' => $request->type,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.facilities.index', ['type' => $request->type])
            ->with('success', 'Facility created successfully');
    }

    public function show(Facility $facility)
    {
        return view('admin.facilities.show', compact('facility'));
    }

    public function edit(Facility $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'type' => 'required|in:amenity,feature',
        ]);

        $facility->update([
            'name' => $request->name,
            'icon' => $request->icon,
            'type' => $request->type,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.facilities.index', ['type' => $facility->type])
            ->with('success', 'Facility updated successfully');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect()->route('admin.facilities.index', ['type' => $facility->type])
            ->with('success', 'Facility deleted successfully');
    }

    public function toggleStatus(Facility $facility)
    {
        $facility->update(['is_active' => !$facility->is_active]);

        return back()->with('success', 'Status updated successfully');
    }
}
