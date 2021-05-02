<?php

namespace App\Providers;

use App\Models\Notification;
use App\Models\User;
use App\View\Components\IfIsNotNull;
use Carbon\Carbon;
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


        view()->composer('*', function ($view) {
            $view->with('loginUser', Auth::user());
        });

        view()->composer('*', function ($view) {

            $vip = false;
            if (Auth::check()) {
                $user = User::find(Auth::id());
                $date = Carbon::parse($user->expire_vip);
                $now = Carbon::now();
                $days = $date->diffInDays($now);
                $vip = $days > 0;
            }

            $view->with('isVip', $vip);
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
