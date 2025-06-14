<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enquiries = Enquiry::where('enquiry_type', 'sell')->latest()->get();
        $title= 'Sell Enquiries';
        return view('admin.selllist', compact('enquiries','title'));
    }
    public function indexcontact()
    {
        $enquiries = Enquiry::where('enquiry_type', 'contact')->latest()->get();
        $title= 'Contact Us Enquiries';
        return view('admin.selllist', compact('enquiries','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sell-create');
    }
    /**
 * Handle contact form submissions
 */
public function contactStore(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'description' => 'required|string',
    ]);

    $enquiry = new Enquiry();
    $enquiry->enquiry_type = 'contact';
    $enquiry->name = $validated['name'];
    $enquiry->email = $validated['email'];
    $enquiry->mobile = $validated['phone'];
    $enquiry->description = $validated['description'];

    $enquiry->save();

    return redirect()->route('contact')->with('success', 'Thank you for contacting us! We will get back to you soon.');
}
  public function clientStore(Request $request)
{
    // dd($request->all());
    // Validate the request data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'email' => 'nullable|email|max:255',
        'property_type' => 'nullable|string|max:255',
        'address' => 'required|string',
        'bedrooms' => 'nullable|integer',
        'bathrooms' => 'nullable|integer',
        'area' => 'nullable|numeric',
        'price' => 'nullable|numeric',
        'description' => 'nullable|string',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'enquiry_type' => 'required|string|in:sell,rent',
    ]);

    $enquiry = new Enquiry();
    $enquiry->enquiry_type = $validated['enquiry_type'];
    $enquiry->name = $validated['name'];
    $enquiry->mobile = $validated['phone']; // client uses 'phone'
    $enquiry->email = $validated['email'] ?? null;
    $enquiry->property_type = $validated['property_type'] ?? null;
    $enquiry->address = $validated['address'];
    $enquiry->bedrooms = $validated['bedrooms'] ?? null;
    $enquiry->bathrooms = $validated['bathrooms'] ?? null;
    $enquiry->area = $validated['area'] ?? null;
    $enquiry->price = $validated['price'] ?? null;
    $enquiry->description = $validated['description'] ?? null;

    // Handle image uploads
    if ($request->hasFile('images')) {
        $imagePaths = [];
        $uploadPath = public_path('uploads/enquiry-images');

        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true, true);
        }

        foreach ($request->file('images') as $image) {
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($uploadPath, $filename);
            $imagePaths[] = 'uploads/enquiry-images/' . $filename;
        }

        $enquiry->images = $imagePaths;
    }

    $enquiry->save();

    return redirect()->route('property.sell')->with('success', 'Thank you for your enquiry! We will contact you soon.');
}

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'property_type' => 'required|string|max:255',
            'address' => 'required|string',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'area' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'message' => 'nullable|string',
        ]);

        $enquiry = new Enquiry();
        $enquiry->enquiry_type = 'sell';
        $enquiry->fill($validated);

        // Handle image uploads to public folder
        if ($request->hasFile('images')) {
            $imagePaths = [];
            $uploadPath = public_path('uploads/enquiry-images');

            // Create directory if it doesn't exist
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($uploadPath, $filename);
                $imagePaths[] = 'uploads/enquiry-images/' . $filename;
            }

            $enquiry->images = $imagePaths;
        }

        $enquiry->save();

        return redirect()->route('admin.property.sell')->with('success', 'Property enquiry created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enquiry $enquiry)
    {
        return view('admin.sell-show', compact('enquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enquiry $enquiry)
    {
        return view('admin.sell-edit', compact('enquiry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'property_type' => 'required|string|max:255',
            'address' => 'required|string',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'area' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'message' => 'nullable|string',
            'status' => 'required|in:pending,contacted,completed',
        ]);

        $enquiry->fill($validated);

        // Handle image uploads to public folder
        if ($request->hasFile('images')) {
            $imagePaths = $enquiry->images ?? [];
            $uploadPath = public_path('uploads/enquiry-images');

            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($uploadPath, $filename);
                $imagePaths[] = 'uploads/enquiry-images/' . $filename;
            }

            $enquiry->images = $imagePaths;
        }

        $enquiry->save();

        return redirect()->route('admin.property.sell')->with('success', 'Property enquiry updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enquiry $enquiry)
    {
        // Delete associated images from public folder
        if ($enquiry->images) {
            foreach ($enquiry->images as $image) {
                $imagePath = public_path($image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        }

        $enquiry->delete();
        return redirect()->route('admin.property.sell')->with('success', 'Property enquiry deleted successfully!');
    }

    /**
     * Remove an image from the enquiry
     */
    public function deleteImage(Enquiry $enquiry, $imageIndex)
    {
        $images = $enquiry->images;

        if (isset($images[$imageIndex])) {
            // Delete the file from public folder
            $imagePath = public_path($images[$imageIndex]);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // Remove the image from the array
            unset($images[$imageIndex]);
            $enquiry->images = array_values($images); // Reindex array
            $enquiry->save();

            return back()->with('success', 'Image removed successfully!');
        }

        return back()->with('error', 'Image not found!');
    }
}
