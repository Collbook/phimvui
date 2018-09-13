<?php
namespace App\Mylibrary\Providers;

use App\Mylibrary\ToolFactory;

use Illuminate\Support\ServiceProvider;

class ToolServiceProviders extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ToolFactory::class, function () {
            return new ToolFactory();
        });
    }
}
