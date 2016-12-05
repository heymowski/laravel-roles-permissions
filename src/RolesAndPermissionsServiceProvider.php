<?php
namespace Heymowski\RolesAndPermissions;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class RolesAndPermissionsServiceProvider extends LaravelServiceProvider {

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(GateContract $gate) {

        $this->handleConfigs();
        $this->handleMigrations();
        $this->handleViews();
        $this->handleSeeds();
        // $this->handleTranslations();
        $this->handleRoutes();

        // Register Gates
        $this->registerGates();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        // Bind any implementations.

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {

        return [];
    }

    private function handleConfigs() {

        $configPath = __DIR__ . '/../config/RolesAndPermissions.php';

        $this->publishes([$configPath => config_path('RolesAndPermissions.php')]);

        $this->mergeConfigFrom($configPath, 'RolesAndPermissions');
    }

    private function handleTranslations() {

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'RolesAndPermissions');
    }

    private function handleViews() {

        $this->loadViewsFrom(__DIR__.'/../views', 'RolesAndPermissions');

        //$this->publishes([__DIR__.'/../views' => base_path('resources/views/vendor/RolesAndPermissions')]);
    }

    private function handleMigrations() {

        $this->publishes([__DIR__ . '/../migrations' => base_path('database/migrations')]);
    }

    private function handleSeeds() {

        $this->publishes([__DIR__ . '/../seeds' => base_path('database/seeds')]);
    }

    private function handleRoutes() {

        include __DIR__.'/Routes/routes.php';
    }

    private function registerGates() {
    	// If Table permissions exists
    	if (\Schema::hasTable('permissions')) {
        	$this->app->register('Heymowski\RolesAndPermissions\Gates\GatesServiceProvider');
        }
    }
}
