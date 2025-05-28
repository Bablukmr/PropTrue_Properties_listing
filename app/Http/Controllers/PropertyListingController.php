<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Property;
use App\Models\PropertyImage;

class PropertyListingController extends Controller
{
    // ... other methods ...
    public function index()
    {
        return view('admin.propertylisting');
    }

    /**
     * Store a newly created property in storage.
     */
    public function store(Request $request)
    {
        // Debugging line to check request data
// dd($request->all());
        $validatedData = $this->validateRequest($request);

        // Begin database transaction
        DB::beginTransaction();

        try {
            // Handle main image upload
            $mainImagePath = $this->handleFileUpload($request->file('main_image'), 'properties/main_images');

            // Handle floor plan image upload
            $floorPlanPath = $this->handleFileUpload($request->file('floor_plan_image'), 'properties/floor_plans');

            // Handle brochure upload
            $brochurePath = $this->handleFileUpload($request->file('brochure'), 'properties/brochures');

            // Create the property
            $property = Property::create([
                // Basic Information
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'slug' => $validatedData['slug'],
                'property_type' => $validatedData['property_type'],
                'listing_type' => $validatedData['listing_type'],
                'price' => $validatedData['price'],
                'price_unit' => $validatedData['price_unit'] ?? '₹',
                'security_deposit' => $validatedData['security_deposit'] ?? null,
                'property_id' => $this->generatePropertyId(),

                // Location Details
                'address' => $validatedData['address'],
                'city' => $validatedData['city'],
                'state' => $validatedData['state'],
                'zip_code' => $validatedData['zip_code'] ?? null,
                'latitude' => $validatedData['latitude'] ?? null,
                'longitude' => $validatedData['longitude'] ?? null,
                'google_map_link' => $validatedData['google_map_link'] ?? null,

                // Property Details
                'bedrooms' => $validatedData['bedrooms'] ?? null,
                'bathrooms' => $validatedData['bathrooms'] ?? null,
                'balconies' => $validatedData['balconies'] ?? null,
                'floors' => $validatedData['floors'] ?? null,
                'floor_number' => $validatedData['floor_number'] ?? null,
                'super_area' => $validatedData['super_area'] ?? null,
                'carpet_area' => $validatedData['carpet_area'] ?? null,
                'plot_area' => $validatedData['plot_area'] ?? null,
                'year_built' => $validatedData['year_built'] ?? null,
                'age_of_property' => $validatedData['age_of_property'] ?? null,

                // Furnishing
                'furnishing' => $validatedData['furnishing'] ?? null,
                'furnishing_details' => $validatedData['furnishing_details'] ?? null,

                // Features & Amenities
                'features' => $validatedData['features'] ?? null,
                'amenities' => $validatedData['amenities'] ?? null,

                // Availability
                'availability' => $validatedData['availability'],
                'available_from' => $validatedData['available_from'] ?? null,
                'preferred_tenants' => $validatedData['preferred_tenants'] ?? null,

                // Media
                'main_image' => $mainImagePath,
                'video_url' => $validatedData['video_url'] ?? null,
                'floor_plan_image' => $floorPlanPath,
                'brochure' => $brochurePath,

                // Additional Info
                'is_featured' => $request->has('is_featured'),
                'is_verified' => $request->has('is_verified'),
                'property_status' => $validatedData['property_status'] ?? 'Available',
                'notes' => $validatedData['notes'] ?? null,
                'keyfeatures' => $validatedData['keyfeatures'] ?? null,

                // Ownership - assuming you'll use auth later
                'user_id' => auth()->id() ?? 1, // Default to 1 if no auth
            ]);

            // Handle additional images
            if ($request->hasFile('property_images')) {
                $this->handleAdditionalImages($request->file('property_images'), $property->id);
            }

            // Handle similar properties
            if (!empty($validatedData['similar_properties'])) {
                $this->handleSimilarProperties($validatedData['similar_properties'], $property->id);
            }

            // Commit the transaction
            DB::commit();

            return redirect()->route('admin.propertylisting')
                ->with('success', 'Property created successfully!');
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollBack();

            return back()->withInput()
                ->with('error', 'Error creating property: ' . $e->getMessage());
        }
    }

    /**
     * Validate the request data.
     */
    protected function validateRequest(Request $request)
    {
        return $request->validate([
            // Basic Information
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|string|unique:full_property_schema,slug',
            'property_type' => 'required|in:Apartment,Villa,Residential Plot,Commercial,Penthouse,House,Condo,Townhouse',
            'listing_type' => 'required|in:For Rent,For Sale,Lease',
            'price' => 'required|numeric|min:0',
            'price_unit' => 'nullable|string',
            'security_deposit' => 'nullable|numeric|min:0',

            // Location Details
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip_code' => 'nullable|string|max:20',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'google_map_link' => 'nullable|url',

            // Property Details
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'balconies' => 'nullable|integer|min:0',
            'floors' => 'nullable|integer|min:0',
            'floor_number' => 'nullable|integer|min:0',
            'super_area' => 'nullable|numeric|min:0',
            'carpet_area' => 'nullable|numeric|min:0',
            'plot_area' => 'nullable|numeric|min:0',
            'year_built' => 'nullable|integer|min:1800|max:' . date('Y'),
            'age_of_property' => 'nullable|integer|min:0',

            // Furnishing
            'furnishing' => 'nullable|in:Fully Furnished,Semi Furnished,Unfurnished',

            // Features & Amenities
            'features' => 'nullable|array',
            'features.*' => 'string',
            'amenities' => 'nullable|array',
            'amenities.*' => 'string',

            // Availability
            'availability' => 'required|in:Immediate,After Date,Negotiable',
            'available_from' => 'nullable|required_if:availability,After Date|date|after_or_equal:today',
            'preferred_tenants' => 'nullable|in:Family,Professionals,Students,Company,Anyone',

            // Media
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'property_images' => 'nullable|array',
            'property_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'nullable|url',
            'floor_plan_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brochure' => 'nullable|file|mimes:pdf|max:5120',

            // Additional Info
            'is_featured' => 'nullable|boolean',
            'is_verified' => 'nullable|boolean',
            'property_status' => 'nullable|in:Available,Rented,Sold,Under Maintenance',
            'notes' => 'nullable|string',
            'keyfeatures' => 'nullable|string',
            'similar_properties' => 'nullable|array',
            'similar_properties.*' => 'nullable|exists:full_property_schema,id',
        ]);
    }

    /**
     * Handle file upload.
     */
    protected function handleFileUpload($file, $directory)
    {
        if (!$file) {
            return null;
        }

        // Create directory if it doesn't exist
        $publicPath = public_path($directory);
        if (!file_exists($publicPath)) {
            mkdir($publicPath, 0755, true);
        }

        $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $file->move($publicPath, $fileName);

        return $directory . '/' . $fileName;
    }

    /**
     * Handle additional images upload.
     */
    protected function handleAdditionalImages($files, $propertyId)
    {
        $directory = 'properties/additional_images';
        $publicPath = public_path($directory);

        if (!file_exists($publicPath)) {
            mkdir($publicPath, 0755, true);
        }

        foreach ($files as $file) {
            $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $file->move($publicPath, $fileName);
            $path = $directory . '/' . $fileName;

            PropertyImage::create([
                'property_id' => $propertyId,
                'image_path' => $path,
                'is_featured' => false,
                'order' => 0,
            ]);
        }
    }

    /**
     * Handle similar properties relationship.
     */
    protected function handleSimilarProperties($similarPropertyIds, $propertyId)
    {
        foreach ($similarPropertyIds as $similarId) {
            DB::table('similar_properties')->insert([
                'property_id' => $propertyId,
                'similar_property_id' => $similarId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Generate a unique property ID.
     */
    protected function generatePropertyId()
    {
        $prefix = 'PROP';
        $random = Str::upper(Str::random(6));
        $timestamp = now()->format('Ymd');

        return "{$prefix}-{$timestamp}-{$random}";
    }
}
