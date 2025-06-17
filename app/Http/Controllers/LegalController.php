<?php

namespace App\Http\Controllers;

use App\Models\Legal;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function privacypolicy()
    {
        return view('pages.privacypolicy');
    }

    public function reradisclaimer()
    {
        $legal = Legal::find(1);

        return view('pages.reradisclaimer', compact('legal'));
    }

    public function termscondition()
    {
        return view('pages.termscondition');
    }

        public function adminreradisclaimer()
    {
        // Always get record with ID 1
        $legal = Legal::findOrFail(1);
        return view('admin.reradesclemar', compact('legal'));
    }

    public function adminreradisclaimerupdate(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'description' => 'nullable|string',
            'type' => 'nullable|string|max:100',
        ]);

        // Always update record with ID 1
        $legal = Legal::findOrFail(1);
        $legal->update($request->only('title', 'description', 'content', 'type'));

        return redirect()->route('admin.reradesclemar')->with('success', 'Page updated successfully.');
    }
}
