<?php

namespace App\Http\Controllers;

use App\Models\ContactDetail;
use Illuminate\Http\Request;

class ContactDetailController extends Controller
{
    public function index()
    {
       $contact = ContactDetail::findOrFail(1);
        return view('admin.contactdetails',compact('contact'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'phone_contact' => 'nullable|string|max:20',
        'phone_sell' => 'nullable|string|max:20',
        'phone_whatsapp' => 'nullable|string|max:20',
        'email_contact' => 'nullable|email|max:255',
        'email_hr' => 'nullable|email|max:255',
        'email_sell' => 'nullable|email|max:255',
    ]);

    $contact = ContactDetail::findOrFail($id);
    $contact->update($request->only([
        'phone_contact',
        'phone_sell',
        'phone_whatsapp',
        'email_contact',
        'email_hr',
        'email_sell',
    ]));

    return redirect()->back()->with('success', 'Contact details updated successfully.');
}
}
