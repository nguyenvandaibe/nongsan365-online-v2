<?php

namespace App\Providers;

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
        $this->app->singleton(
            \App\Actions\CategoryActionInteface::class,
            \App\Actions\CategoryAction::class
        );

        $this->app->singleton(
            \App\Actions\ProductActionInterface::class,
            \App\Actions\ProductAction::class
        );

        $this->app->singleton(
            \App\Shared\Utilities\MediaUploaderInterface::class,
            \App\Shared\Utilities\MediaUploader::class
        );
    }
}
