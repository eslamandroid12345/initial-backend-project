<?php

namespace App\Providers;
use App\Http\Services\Api\V1\Auth\AuthMobileService;
use App\Http\Services\Api\V1\Auth\AuthService;
use App\Http\Services\Api\V1\Auth\AuthWebService;
use Illuminate\Support\ServiceProvider;


class PlatformServiceProvider extends ServiceProvider
{

    public function detectPlatform($webService , $mobileService){
        if (request()->is('api/v1/website'))
            return $webService;
        return $mobileService;
    }


    public function register()
    {
        $this->app->singleton(AuthService::class, $this->detectPlatform(AuthWebService::class,AuthMobileService::class));

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
