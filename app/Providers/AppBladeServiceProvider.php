<?php

namespace App\Providers;

use App\Models\User;
use App\View\Components\IfIsNotNull;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppBladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::component('if-is-not-null', IfIsNotNull::class);

        Blade::if("isfullready", function () {
            $user = User::find(Auth::id());
            $profile = $user->profile[0];
            return $profile->fullname != "" && $profile->address;
        });
       
    }
}
