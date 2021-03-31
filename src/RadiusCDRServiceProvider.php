<?php

namespace Streitleak\RadiusWeb;

use Illuminate\Support\ServiceProvider;

class RadiusCDRServiceProvider extends ServiceProvider
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
        //
        $this->publishes([
            __DIR__ . '/resources/css' => public_path('css'),
//            __DIR__ . '/resources/img' => public_path('radiuscdr/img'),
            __DIR__ . '/resources/js'  => public_path('js'),
            
            
/*            // css
            base_path('vendor/streitleak/web/src/resources/css/app.css')                          => public_path('radiuscdr/css/app.css'),
            base_path('vendor/streitleak/web/src/resources/css/jquery-ui.css')                    => public_path('radiuscdr/css/jquery-ui.css'),
            base_path('vendor/streitleak/web/src/resources/css/jquery-ui.stureture.css')          => public_path('radiuscdr/css/jquery-ui.stureture.css'),
            base_path('vendor/streitleak/web/src/resources/css/jquery-ui.theme.css')              => public_path('radiuscdr/css/jquery-ui.theme.css'),
            base_path('vendor/streitleak/web/src/resources/css/jquery-ui-timepicker-addon.css')   => public_path('radiuscdr/css/jquery-ui-timepicker-addon.css'),
            base_path('vendor/streitleak/web/src/resources/css/reset.css')                        => public_path('radiuscdr/css/reset.css'),
            base_path('vendor/streitleak/web/src/resources/css/style.css')                        => public_path('radiuscdr/css/style.css'),

            // js
            base_path('vendor/streitleak/web/src/resources/js/app.js')                        => public_path('radiuscdr/js/app.js'),
            base_path('vendor/streitleak/web/src/resources/js/bootstrap.js')                  => public_path('radiuscdr/js/bootstrap.js'),
            base_path('vendor/streitleak/web/src/resources/js/jquery-3.5.1.min.js')           => public_path('radiuscdr/js/jquery-3.5.1.min.js'),
            base_path('vendor/streitleak/web/src/resources/js/jquery-ui.min.js')              => public_path('radiuscdr/js/jquery-ui.min.js'),
            base_path('vendor/streitleak/web/src/resources/js/jquery-ui-timepicker-addon.js') => public_path('radiuscdr/js/jquery-ui-timepicker-addon.js'),                        
 */           
        ],  'public');
        $this->loadRoutesFrom(__DIR__.'/route/route.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__.'/resources/views','radiusweb');
    }
}
