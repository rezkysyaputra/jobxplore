<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = auth()->user()
            ->jobApplications()
            ->with([
                'job' => fn($query) => $query->withCount('jobApplications')
                    ->withAvg('jobApplications', 'expected_salary')
                    ->withTrashed()
            ], 'job.employer')
            ->whereHas('job', function ($query) {
                $query->withTrashed();
            })
            ->latest()
            ->get();
        return view('my-job-application.index', compact('applications'));
    }

    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();

        return redirect()->back()
            ->with('success', 'Application deleted successfully');
    }
}
