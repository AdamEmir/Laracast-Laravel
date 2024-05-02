<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->Paginate(3);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function show(Job $job)
    {
        //replace {job} to {id} & function($id)
        //$job = Job::findOrFail($id);
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        //validation
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        //store the job
        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);

        return redirect('/jobs');
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function edit(Job $job)
    {
        //replace {job} to {id} & function($id)
        //$job = Job::findOrFail($id);

//        if (Auth::guest()) {
//            return redirect('/login');
//        }

//        Gate::authorize('edit-job', $job);

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        //authorize (on hold....)
        //validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        //search laravel route model binding
        //update the job
        //replace {job} to {id} & function($id)
        //$job = Job::findOrFail($id);

        $job->title = request('title');
        $job->salary = request('salary');
        //$job->save();

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        //redirect to the job page
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        //authorize (on hold)
        //delete the job
        //$job = Job::findOrFail($id);
        //$job->delete();
        //replace {job} to {id} & function($id)
        //$job = Job::findOrFail($id);
        $job->delete();
        //redirect
        return redirect('/jobs');
    }
}
