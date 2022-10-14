<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\BikeComposer;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //vincula el viewComposer a 1 vistas
        
//         View::composer('bikes.bikeList', function($view){
//             $view->with('total',Bike::count());
//           }
//         );

        
        //vincula el viewComposer a 2 vistas
    // View::composer(['*bikes.list', 'bikes.create',BikeComposer::class]);

        
        
        //vincula el viewComposer a todas las  vistas
        View::composer('*', BikeComposer::class);
    }
}
