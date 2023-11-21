<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree\Gateway;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
            [
                'environment' => 'sandbox',
                'merchantId' => '3yw86rh4rt6cmydt',
                'publicKey' => 'b65zxxm24m4sg2h4',
                'privateKey' => 'dc53df945a23d0c166dd2e97680fbdf3'
            ]
            );
        });
    }
}