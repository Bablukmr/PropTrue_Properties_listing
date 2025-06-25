<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobOpening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CareerController extends Controller
{
    public function joinus()
    {
        $jobopnings = JobOpening::latest()->get();
        return view('career.index', compact('jobopnings'));
    }

    public function openingview()
    {
        $openings = JobOpening::latest()->get();
        return view('career.opening', compact('openings'));
    }

    public function create()
    {
        return view('career.openingcreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'job_type' => 'required|string|in:Full-time,Part-time,Contract,Internship',
            'benefits' => 'nullable|string',
            'opening_start_date' => 'nullable|date',
            'opening_end_date' => 'nullable|date|after_or_equal:opening_start_date',
        ]);

        try {
            // Convert benefits string to array and then to JSON
            $benefits = [];
            if ($request->benefits) {
                $benefits = explode(',', $request->benefits);
                $benefits = array_filter(array_map('trim', $benefits)); // Remove empty values
            }

            JobOpening::create([
                'title' => $request->title,
                'description' => $request->description,
                'designation' => $request->designation,
                'department' => $request->department,
                'job_type' => $request->job_type,
                'benefits' => !empty($benefits) ? json_encode($benefits) : null,
                'opening_start_date' => $request->opening_start_date,
                'opening_end_date' => $request->opening_end_date,
            ]);

            return redirect()->route('admin.career.opening')->with('success', 'Opening created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating job opening: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Failed to create opening. Please try again.');
        }
    }

    public function edit($id)
    {
        $opening = JobOpening::findOrFail($id);
        return view('career.openingedit', compact('opening'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'job_type' => 'required|string|in:Full-time,Part-time,Contract,Internship',
            'benefits' => 'nullable|string',
            'opening_start_date' => 'nullable|date',
            'opening_end_date' => 'nullable|date|after_or_equal:opening_start_date',
        ]);

        try {
            $opening = JobOpening::findOrFail($id);

            // Convert benefits string to array and then to JSON
            $benefits = [];
            if ($request->benefits) {
                $benefits = explode(',', $request->benefits);
                $benefits = array_filter(array_map('trim', $benefits)); // Remove empty values
            }

            $opening->update([
                'title' => $request->title,
                'description' => $request->description,
                'designation' => $request->designation,
                'department' => $request->department,
                'job_type' => $request->job_type,
                'benefits' => !empty($benefits) ? json_encode($benefits) : null,
                'opening_start_date' => $request->opening_start_date,
                'opening_end_date' => $request->opening_end_date,
            ]);

            return redirect()->route('admin.career.opening')->with('success', 'Opening updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating job opening: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Failed to update opening. Please try again.');
        }
    }

    public function destroy($id)
    {
        try {
            $opening = JobOpening::findOrFail($id);
            $opening->delete();
            return redirect()->route('admin.career.opening')->with('success', 'Opening deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting job opening: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete opening. Please try again.');
        }
    }

    public function storeApplication(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'position' => 'nullable|string|max:255',
        'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // 5MB max
        'message' => 'nullable|string',
        'agree' => 'required|accepted',
        'application_types' => 'required|in:join,associate',
         'g-recaptcha-response' => 'required|captcha',
    ]);

    try {
        // Handle file upload - store directly in public/resumes
        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $fileName = time() . '_' . $resume->getClientOriginalName();
            $resume->move(public_path('resumes'), $fileName);
            $resumePath = 'resumes/' . $fileName;
        }

        // For join applications, find the job opening
        $jobOpeningId = null;
        if ($request->application_types === 'join' && $request->position) {
            $jobOpening = JobOpening::where('title', $request->position)->first();
            if ($jobOpening) {
                $jobOpeningId = $jobOpening->id;
            }
        }

        // Create application
        JobApplication::create([
            'job_opening_id' => $jobOpeningId,
            'name' => trim($request->first_name . ' ' . $request->last_name),
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'resume_path' => $resumePath,
            'position' => $request->position,
            'application_types' => $request->application_types,
        ]);

        return redirect()->back()->with('success', 'Your application has been submitted successfully!');
    } catch (\Exception $e) {
        Log::error('Error submitting job application: ' . $e->getMessage());
        return back()->withInput()->with('error', 'Failed to submit application. Please try again.');
    }
}

    public function joinussubmitionlist()
    {
        $applications = JobApplication::with('jobOpening')->where('application_types', 'join')->latest()->get();
        return view('career.joinussubmitionlist', compact('applications'));
    }
    public function associateussubmitionlist()
    {
        $applications = JobApplication::with('jobOpening')->where('application_types', 'associate')->latest()->get();
        // dd($applications);
        return view('career.associateussubmitionlist', compact('applications'));
    }

    public function updateApplicationStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,reviewed,rejected,hired'
        ]);

        try {
            $application = JobApplication::findOrFail($id);
            $application->update(['status' => $request->status]);

            return back()->with('success', 'Application status updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating application status: ' . $e->getMessage());
            return back()->with('error', 'Failed to update status.');
        }
    }

    public function viewApplication($id)
    {
        $application = JobApplication::with('jobOpening')->findOrFail($id);
        return view('career.application_view', compact('application'));
    }

    public function downloadResume($id)
    {
        $application = JobApplication::findOrFail($id);

        // Check if resume exists
        if (!$application->resume_path) {
            abort(404, 'Resume not found');
        }

        // Get the full path to the resume file
        $path = public_path($application->resume_path);

        // Check if file exists
        if (!file_exists($path)) {
            abort(404, 'File not found');
        }

        // Return the file as a download response
        return response()->download($path);
    }

    public function assosiatewithus()
    {
        return view('career.assosiatewithus');
    }
}
