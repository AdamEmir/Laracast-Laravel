<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::preventLazyLoading();

//        Gate::define('edit-job', function (User $user, job $job) {
//            //return boolean
//            return $job->employer->user->is($user);
//        });

//        if ($job->employer->user->isNot(Auth::user())) {
//            abort(403);
//        }

//        Paginator::useBootstrap();
    }
}
