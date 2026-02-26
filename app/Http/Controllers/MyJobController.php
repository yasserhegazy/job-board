<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyJobController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $this->authorize('viewAnyEmployer', Job::class);
        return view('my_job.index', [
            'jobs' => Auth::user()->employer->jobs()
            ->with(['employer', 'jobApplications', 'jobApplications.user'])
            ->withTrashed()
            ->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $myJob)
    {
        //
        $this->authorize('create', Job::class);
        return view('my_job.create', [
            'job' => $myJob
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        //
        // $validatedData = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'location' => 'required|string|max:255',
        //     'salary' => 'required|numeric|min:5000',
        //     'description' => 'required|string',
        //     'experience' => 'required|in:' . implode(',', Job::$experience),
        //     'category' => 'required|in:' . implode(',', Job::$categories)
        // ]);
        // auth()->user()->employer->jobs()->create($validatedData);
        // We create custom request to validate the data
        $this->authorize('create', Job::class);
        auth()->user()->employer->jobs()->create($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job created successfully.');
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
    public function edit(Job $myJob)
    {
        $this->authorize('update', $myJob);
        return view('my_job.edit', compact('myJob'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, Job $myJob)
    {
        $this->authorize('update', $myJob);
        $myJob->update($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $myJob)
    {
        // This method deletes a job owned by the authenticated employer. A soft delete can also be implemented here.
        $myJob->delete();
        return redirect()->route('my-jobs.index')->with('success', 'Job deleted successfully.');
    }

    /**
     * Restore the specified soft-deleted resource.
     */
    public function restore(Job $myJob)
    {
        $this->authorize('restore', $myJob);
        $myJob->restore();
        return redirect()->route('my-jobs.index')
            ->with('success', 'Job restored successfully.');
    }
}
