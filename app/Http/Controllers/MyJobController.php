<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Employer;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my-job.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my-job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|numeric|min:100',
            'type' => 'required|in:'. implode(',', \App\Models\Job::$types),
            'experience' => 'required|in:'. implode(',', \App\Models\Job::$experiences),
            'category' => 'required|in:'. implode(',', \App\Models\Job::$categories),
        ]);

        auth()->user()->employer->jobs()->create($validatedData);

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
