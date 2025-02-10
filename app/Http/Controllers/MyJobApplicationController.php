<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

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
            ], 'job.employer')
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
