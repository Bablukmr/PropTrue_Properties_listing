<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyInquiry;
use App\Models\Property;
use Illuminate\Support\Facades\Validator;

class PropertyInquiryController extends Controller
{

    public function enquiryForm(){
        $inquaries = PropertyInquiry::with('property')->latest()->get();
        // dd($inquaries);
        return view('admin.enquaryformlist', compact('inquaries'));
    }

    public function store(Request $request, Property $property)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
            'terms' => 'required|accepted',
            'g-recaptcha-response' => 'nullable|recaptcha'
        ]);

        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        PropertyInquiry::create([
            'property_id' => $property->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'terms_accepted' => true
        ]);

        return redirect()->back()->with('success', 'Your inquiry has been submitted successfully!');
    }
}
