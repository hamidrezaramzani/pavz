<?php

namespace App\Providers;

use App\Models\Notification;
use App\Models\User;
use App\View\Components\IfIsNotNull;
use Doctrine\DBAL\Schema\View;
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
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {



        view()->composer('*', function ($view) {
            $view->with('notifications', Notification::where([
                ["user_id", Auth::id()],
                ['status', "new"]
            ])->limit(5)->get());
        });

        Blade::component('if-is-not-null', IfIsNotNull::class);

        Blade::if("isfullready", function () {
            $user = User::find(Auth::id());
            $profile = $user->profile;            
            return $profile && $profile->fullname;
        });


        Blade::if("admin", function () {
            return Auth::user() && Auth::user()->level == "admin";
        });

    }
}
