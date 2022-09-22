<?php

namespace App\Providers;

use App\Mail\TestMail;
use App\Mail\UpdateMail;
use App\Models\Admin;
use App\Models\Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        Admin::created(function($user){
            Mail::to($user)->send(new TestMail($user));

        });
        Client::created(function($user){
            Mail::to($user)->send(new TestMail($user));

        });
        // لتحديث البيانات
        Client::updated(function($user){
            Mail::to($user)->send(new UpdateMail($user));

        });
    }
}
