<?php

namespace Hup234design\FilamentCms;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Filament\PluginServiceProvider;
use Hup234design\FilamentCms\Commands\FilamentCmsSeeder;
use Hup234design\FilamentCms\Commands\FilamentCmsSetup;
use Hup234design\FilamentCms\Components\AppLayout;
use Hup234design\FilamentCms\Components\EventsLayout;
use Hup234design\FilamentCms\Components\PostsLayout;
use Hup234design\FilamentCms\Components\ProjectsLayout;
use Hup234design\FilamentCms\Components\ServicesLayout;
use Hup234design\FilamentCms\Filament\Resources\EventCategoryResource;
use Hup234design\FilamentCms\Filament\Resources\EventResource;
use Hup234design\FilamentCms\Filament\Resources\MediaLibraryResource;
use Hup234design\FilamentCms\Filament\Resources\PageResource;
use Hup234design\FilamentCms\Filament\Resources\PostCategoryResource;
use Hup234design\FilamentCms\Filament\Resources\PostResource;
use Hup234design\FilamentCms\Filament\Resources\ProjectCategoryResource;
use Hup234design\FilamentCms\Filament\Resources\ProjectResource;
use Hup234design\FilamentCms\Filament\Resources\ServiceResource;
use Hup234design\FilamentCms\Filament\Resources\TestimonialResource;
use Hup234design\FilamentCms\Models\Post;
use Intervention\Image\Image;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\ImageManipulation;
use RyanChandler\FilamentNavigation\Filament\Resources\NavigationResource;
use Spatie\LaravelPackageTools\Package;

class FilamentCmsServiceProvider extends PluginServiceProvider
{
    protected function getResources(): array
    {
        return [
            PageResource::class,
            PostCategoryResource::class,
            PostResource::class,
            ProjectCategoryResource::class,
            ProjectResource::class,
            ServiceResource::class,
            TestimonialResource::class,
            EventCategoryResource::class,
            EventResource::class,
            MediaLibraryResource::class
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
            ->hasConfigFile()
            ->hasViewComponents('cms',
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

        NavigationResource::navigationGroup("Settings");
        NavigationResource::navigationSort(1);

        Filament::registerNavigationGroups([
            'Post Management',
            'Content Management',
            'Event Management',
            'Media',
            'Authentication',
            'Settings',
        ]);

        Filament::serving(function () {
            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label('View Site')
                    //->url(route('home'))
                    ->url('/')
                    ->icon('heroicon-s-cog')
            ]);
            Filament::registerViteTheme('resources/css/filament.css');
        });

        foreach ( config('filament-cms.media.variants') as $variant=>$setting) {
            ImageManipulator::defineVariant(
                $variant,
                ImageManipulation::make(function (Image $image) use ($setting) {
                    $image->fit($setting['width'], $setting['height']);
                })
            );
        }

        parent::packageBooted();
    }

    public function boot(): void
    {
        parent::boot();

//        Filament::serving(function () {
//            // Using Vite
//            Filament::registerViteTheme('resources/css/filament.css');
//        });
    }

}
