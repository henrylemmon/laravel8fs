<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Blade;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades\Gate;
use App\Services\MailchimpNewsletter;
use Illuminate\Database\Eloquent\Model;
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
        $this->app->bind(Newsletter::class, function () {
            $client = (new ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => config('services.mailchimp.server'),
            ]);

            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        Gate::define('admin', function (User $user) {
            return $user->username == 'henrylemmon';
        });

        Blade::if('admin', function () {
            return request()->user()->can('admin'); // not quite right
        });
    }
}
