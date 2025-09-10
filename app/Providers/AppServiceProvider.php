<?php

namespace App\Providers;

use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useTailwind(); // ⬅ Esto habilita estilos Tailwind para la paginación
         FacadesView::composer('*', function ($view) {
        $view->with('favoritosCount', auth()->check() ? auth()->user()->favoritos()->count() : 0);
    });
    }
}
