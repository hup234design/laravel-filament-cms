<?php

namespace Hup234design\FilamentCms;

use Filament\Facades\Filament;
use Filament\PluginServiceProvider;
use Hup234design\FilamentCms\Commands\FilamentCmsSeeder;
use Hup234design\FilamentCms\Commands\FilamentCmsSetup;
use Hup234design\FilamentCms\Components\AppLayout;
use Hup234design\FilamentCms\Components\EventsLayout;
use Hup234design\FilamentCms\Components\PostsLayout;
use Hup234design\FilamentCms\Components\ProjectsLayout;
use Hup234design\FilamentCms\Components\ServicesLayout;
use Hup234design\FilamentCms\Filament\Resources\PageResource;
use Spatie\LaravelPackageTools\Package;

class FilamentCmsServiceProvider extends PluginServiceProvider
{
    protected function getResources(): array
    {
        return [
            PageResource::class
        ];
    }

    protected function getPages(): array
    {
        return [
            //
        ];
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-cms')->hasViewComponents('cms',
                AppLayout::class,
                PostsLayout::class,
                EventsLayout::class,
                ProjectsLayout::class,
                ServicesLayout::class,
            )
            ->hasCommands([
                FilamentCmsSetup::class,
                FilamentCmsSeeder::class
            ])
            ->hasRoute('web')
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        parent::packageRegistered();
    }

    public function packageBooted(): void
    {
        $this->loadMigrationsFrom([
            __DIR__ . '/../database/migrations',
            __DIR__ . '/../database/settings',
        ]);

        parent::packageBooted();
    }

    public function boot(): void
    {
        parent::boot();

        Filament::serving(function () {
            // Using Vite
            Filament::registerViteTheme('resources/css/filament.css');
        });
    }

}
