<?php

namespace Hup234design\FilamentCms;

use Filament\PluginServiceProvider;
use Hup234design\FilamentCms\Commands\FilamentCmsSeeder;
use Spatie\LaravelPackageTools\Package;

class FilamentCmsServiceProvider extends PluginServiceProvider
{
    protected function getResources(): array
    {
        return [
            //
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
            ->name('filament-cms')
            ->hasCommands([
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
    }

}
