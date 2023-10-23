<?php

namespace Modules\Alive\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Modules\Alive\Livewire\Components\Flash;
use Modules\Alive\Livewire\Components\Navbar;
use Modules\Alive\Livewire\Components\Sidebar;

class AliveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return array
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/module.php',
            'alive'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMigration();

        $this->registerBladeView();

        $this->registerTranslations();

        $this->registerViewComponent();

        $this->registerCommand();

        $this->registerLivewireComponents();
    }

    /**
     * Define livewire component
     *
     * @return void
     */
    protected function defineLivewireComponents(): array
    {
        return [
            Navbar::class,
            'sidebar' => Sidebar::class,
            'flash' => Flash::class,
        ];
    }

    /**
     * Register list of command
     *
     * @return void
     */
    protected function registerCommand()
    {

        if ($this->app->runningInConsole()) {
            $this->commands([
                // InstallCommand::class,
            ]);
        }
    }

    /**
     * Load view component
     *
     * @return void
     */
    protected function registerViewComponent()
    {
        $this->loadViewComponentsAs('alive', [
            // Alert::class,
        ]);
    }

    /**
     * Register migration directory
     *
     * @return void
     */
    protected function registerMigration()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Databases/Migrations');
    }

    /**
     * Register blade view directory
     *
     * @return void
     */
    protected function registerBladeView()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'alive');
    }

    /**
     * Register Translations directory
     *
     * @return void
     */
    protected function registerTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'alive');
    }

    /**
     * Register register livewire component
     *
     * @return void
     */
    protected function registerLivewireComponents()
    {
        foreach ($this->defineLivewireComponents() as $alias => $component) {
            if (is_numeric($alias)) {
                $name = Str::of(collect(explode('\\', $component))->pop())->snake('-');
                Livewire::component("alive-{$name}", $component);
            } else {
                Livewire::component("alive-{$alias}", $component);
            }
        }
    }
}
