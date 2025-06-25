<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\SimilarProperty;
use Illuminate\Http\Request;

class PropertyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexdummy()
    {
        return view('propertydetail');
    }

    public function index($id)
    {
        $property = Property::with(['images', 'owner','facilities'])->findOrFail($id);
        // dd($property);
        // All images for this property
        $propertyimagesall = PropertyImage::where('property_id', $id)->get();

        // Get featured image (or fallback)
        $featuredImage = $propertyimagesall->where('is_featured', true)->first() ?? $propertyimagesall->first();

        // Get similar property IDs from the pivot table
        $similarPropertyIds = SimilarProperty::where('property_id', $id)->pluck('similar_property_id');

        // Fetch actual similar properties with their images
        $similarProperties = Property::with('images')
            ->whereIn('id', $similarPropertyIds)
            ->get()
            ->map(function ($similar) {
                $similar->featuredImage = $similar->images->where('is_featured', true)->first()
                    ?? $similar->images->first();
                return $similar;
            });
            $facilities = $property->facilities;
        // dd($facilities);
        return view('propertydetails', compact(
            'property',
            'propertyimagesall',
            'featuredImage',
            'similarProperties',
            'facilities'
        ));
    }



    public function search()
    {
        return view('search');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
