<?php

namespace Stackstra\Laravel;

use Illuminate\Support\ServiceProvider;
use Stackstra\Etc\Debug;
use Stackstra\Lock\Lock;

class StackstraServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Lock::class, function ($app)
        {
            return new Lock($app->make('config')->get('stackstra.lock_path', storage_path('app/stackstra.lock')));
        });
    }

    public function boot(): void
    {
        if ($this->app->make('config')->get('app.debug'))
        {
            Debug::enable();
        }
        else
        {
            Debug::disable();
        }
    }
}
