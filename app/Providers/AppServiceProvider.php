<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/*Insertamos los siguientes metodos para el login & registro*/
use Illuminate\Support\Facades\Schema;

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
        /* Insertamos este metodo para que nos ayude en las migraciones y nos establezca en los
        string por defecto 191 caracteres */
        Schema::defaultStringLength(191);
    }
}
