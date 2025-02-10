<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Job::class);

        $filters = request()->only([
            'search',
            'location',
            'min_salary',
            'max_salary',
            'experience',
            'job_type',
            'category'
        ]);

        $jobs = Job::with('employer')->latest()->filter($filters)->paginate();

        return view('job.index', ['jobs' => $jobs]);
    }

    public function show(Job $job)
    {
        Gate::authorize('view', $job);

        return view('job.show', data: ['job' => $job->load('employer.jobs')]);
    }
}
