<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('home');
});

//Show all job
Route::get('/jobs', function () {

    $jobs = Job::with('employer')->latest()->Paginate(3);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

//Show job form
Route::get('/jobs/create', function () {

    return view('jobs.create');
});

//Show single job
Route::get('/jobs/{id}', function ($id) {

    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

//Store job
Route::post('/jobs', function () {
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
});

//Edit job
Route::get('/jobs/{id}/edit', function ($id) {

    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});

//Update job
Route::patch('/jobs/{id}', function ($id) {
    //validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    //authorize (on hold....)
    //search laravel route model binding
    //update the job
    $job = Job::findOrFail($id);

    $job->title = request('title');
    $job->salary = request('salary');
//    $job->save();

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    //redirect to the job page
    return redirect('/jobs/' . $job->id);
});

//Destroy job
Route::delete('/jobs/{id}', function ($id) {
    //authorize (on hold)
    //delete the job
//    $job = Job::findOrFail($id);
//    $job->delete();
    Job::findOrFail($id)->delete();
    //redirect
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});

