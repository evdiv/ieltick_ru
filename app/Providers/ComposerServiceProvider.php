<?php

namespace App\Providers;

use App\Http\Composers\GlobalComposer;
use App\Http\Composers\UserComposer;
use App\Http\Composers\LessonsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

/**
 * Class ComposerServiceProvider.
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Global
         */
        // This class binds the $logged_in_user variable to every view
        View::composer('*', GlobalComposer::class);

        /*
         * Frontend
         */
        View::composer('*', UserComposer::class);
        View::composer('frontend.lessons', LessonsComposer::class);

        /*
         * Backend
         */
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
