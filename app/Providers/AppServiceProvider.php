<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Billing\PaymentGatewayContract;
use App\Billing\BankPaymentGateway;
use App\Billing\CreditCardPaymentGateway;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        return $this->app->singleton(PaymentGatewayContract::class, function ($app) {

            if (request()->has('credit')) {
                return new CreditCardPaymentGateway('usd');
            }

            return new BankPaymentGateway('eur');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
