<?php

namespace DtechBook\Book;

use Illuminate\Support\ServiceProvider;

class BookServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $package_name = 'book';

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', $package_name);
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', $package_name);

        $this->vendorPublish($package_name);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/book.php', 'book');
    }

    /**
     * Vendor publish module
     * @param $package_name
     */
    private function vendorPublish($package_name)
    {
        $this->publishes([
            __DIR__ . '/../config/book.php' => config_path('book.php')
        ], 'book-config');

        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations')
        ], 'book-migrations');

        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('vendor/'.$package_name)
        ], 'book-assets');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/'.$package_name)
        ], 'book-lang');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/'.$package_name)
        ], 'book-views');
    }
}
