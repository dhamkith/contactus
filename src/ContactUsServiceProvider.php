<?php


namespace Dhamkith\Contactus;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Dhamkith\Contactus\Facades\DhamkithContact;

class ContactUsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $date = date('Y_m_d_His');

        $this->commands([
            //Console\Commands\MigrationCommand::class,
        ]);

        $this->publishes([
            
            __DIR__.'/../config/dhamkith_contactus.php' => config_path('dhamkith_contactus.php'),

            __DIR__.'/../resources/views/contact.blade.php' => resource_path('views/vendor/contactus/contact.blade.php'),
            __DIR__.'/../resources/views/index.blade.php' => resource_path('views/vendor/contactus/index.blade.php'),
            __DIR__.'/../resources/views/show.blade.php' => resource_path('views/vendor/contactus/show.blade.php'),

            __DIR__.'/../public/css/dhamkith-contactus.css' => public_path('css/dhamkith-contactus.css'),
            __DIR__.'/../public/js/dhamkith-contactus.js' => public_path('js/dhamkith-contactus.js'),

            __DIR__.'/../public/fonts/dhamkith.eot' => public_path('fonts/dhamkith.eot'),
            __DIR__.'/../public/fonts/dhamkith.svg' => public_path('fonts/dhamkith.svg'),
            __DIR__.'/../public/fonts/dhamkith.ttf' => public_path('fonts/dhamkith.ttf'),
            __DIR__.'/../public/fonts/dhamkith.woff' => public_path('fonts/dhamkith.woff'),

        ], 'contactus');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerResources();

    }

    private function registerResources()
    {
        if (! Schema::hasTable('contact_us')) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'contactus');

        $this->registeFacades();
        $this->registeRoutesr();
    }

    protected function registeRoutesr()
    {
        Route::group($this->routeConfiguration(), function (){
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => DhamkithContact::path(),
            'namespace' => 'Dhamkith\Contactus\Http\Controllers',
            'middleware' => 'web'
        ];
    }

    protected function registeFacades()
    {
        $this->app->singleton('DhamkithContact', function ($app) {
            return new \Dhamkith\Contactus\DhamkithContact();
        });
    }
}
