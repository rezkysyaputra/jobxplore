<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Storage;

class JobApplicationController extends Controller
{

    public function create(Job $job)
    {
        Gate::authorize('apply', $job);
        Gate::authorize('isOwner', $job);

        return view('job-application.create', ['job' => $job]);
    }

    public function store(Job $job, Request $request)
    {
        Gate::authorize('apply', $job);
        Gate::authorize('isOwner', $job);

        $validatedData = $request->validate([
            'expected_salary' => 'required|min:1|max:1000000',
            'cv' => 'required|file|mimes:pdf|max:2048'
        ]);

        $file = $request->file('cv');
        $path = $file->store('cvs', 'local');

        $job->jobApplications()->create([
            'user_id' => $request->user()->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $path
        ]);

        return redirect()->route('jobs.show', $job)
            ->with('success', 'Application sent successfully');
    }

    public function downloadCV(JobApplication $application)
    {
        return Storage::download($application->cv_path, 'CV_' . $application->user->name . '.pdf', ['Content-Type' => 'application/pdf']);
    }
}
