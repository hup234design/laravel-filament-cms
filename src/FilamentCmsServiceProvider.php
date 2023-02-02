<?php

namespace Hup234design\FilamentCms;

use Filament\Facades\Filament;
use Filament\Forms\Components\Select;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\UserMenuItem;
use Filament\PluginServiceProvider;
use Hup234design\FilamentCms\Commands\FilamentCmsSeeder;
use Hup234design\FilamentCms\Commands\FilamentCmsSetup;
use Hup234design\FilamentCms\Components\AppLayout;
use Hup234design\FilamentCms\Components\EventsLayout;
use Hup234design\FilamentCms\Components\PostsLayout;
use Hup234design\FilamentCms\Components\ProjectsLayout;
use Hup234design\FilamentCms\Components\ServicesLayout;
use Hup234design\FilamentCms\Filament\Blocks\ButtonsBlock;
use Hup234design\FilamentCms\Filament\Blocks\CallToActionBlock;
use Hup234design\FilamentCms\Filament\Blocks\EventBlock;
use Hup234design\FilamentCms\Filament\Blocks\GalleryBlock;
use Hup234design\FilamentCms\Filament\Blocks\ImageBlock;
use Hup234design\FilamentCms\Filament\Blocks\ProjectBlock;
use Hup234design\FilamentCms\Filament\Blocks\RichEditorBlock;
use Hup234design\FilamentCms\Filament\Blocks\TestimonialBlock;
use Hup234design\FilamentCms\Filament\Components\MediaPicker;
use Hup234design\FilamentCms\Filament\Forms\Components\MediaLibraryPicker;
use Hup234design\FilamentCms\Filament\Pages\ManageCmsSettings;
use Hup234design\FilamentCms\Filament\Resources\EventCategoryResource;
use Hup234design\FilamentCms\Filament\Resources\EventResource;
use Hup234design\FilamentCms\Filament\Resources\GalleryResource;
use Hup234design\FilamentCms\Filament\Resources\MediaLibraryResource;
use Hup234design\FilamentCms\Filament\Resources\PageResource;
use Hup234design\FilamentCms\Filament\Resources\PostCategoryResource;
use Hup234design\FilamentCms\Filament\Resources\PostResource;
use Hup234design\FilamentCms\Filament\Resources\ProjectCategoryResource;
use Hup234design\FilamentCms\Filament\Resources\ProjectResource;
use Hup234design\FilamentCms\Filament\Resources\ServiceResource;
use Hup234design\FilamentCms\Filament\Resources\TestimonialResource;
use Hup234design\FilamentCms\Models\Page;
use Hup234design\FilamentCms\Models\Post;
use Hup234design\FilamentCms\Settings\CmsSettings;
use Illuminate\Support\Facades\Schema;
use Intervention\Image\Image;
use Livewire\Livewire;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\ImageManipulation;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;
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
            MediaLibraryResource::class,
            GalleryResource::class,
        ];
    }

    protected function getPages(): array
    {
        return [
            ManageCmsSettings::class,
        ];
    }

    protected array $styles = [
        'media-cropper-style' => __DIR__ . '/../resources/dist/css/cropper.min.css',
    ];

    protected array $scripts = [
        'media-cropper-script' => __DIR__ . '/../resources/dist/js/cropper.min.js',
    ];

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
            ->hasAssets()
            ->hasRoute('web')
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        parent::packageRegistered();
    }

    public function packageBooted(): void
    {
        parent::packageBooted();

        $this->loadMigrationsFrom([
            __DIR__ . '/../database/migrations',
            __DIR__ . '/../database/settings',
        ]);

        // filament navigation
        if (Schema::hasTable('pages')) {
            FilamentNavigation::addItemType('Page', [
                Select::make('slug')
                    ->label('Pages')
                    ->options(
                        collect([
                            'home' => 'Home Page',
                        ])->merge(
                            Page::where('home', false)->where('visible', true)->pluck('title', 'slug')
                        )
                    )
            ]);
            FilamentNavigation::addItemType('Index Pages', [
                Select::make('slug')
                    ->label('Index Pages')
                    ->options([
                            app(CmsSettings::class)->services_slug => app(CmsSettings::class)->services_title,
                            app(CmsSettings::class)->projects_slug => app(CmsSettings::class)->projects_title,
                            app(CmsSettings::class)->events_slug => app(CmsSettings::class)->events_title,
                            app(CmsSettings::class)->testimonials_slug => app(CmsSettings::class)->testimonials_title,
                            app(CmsSettings::class)->posts_slug => app(CmsSettings::class)->posts_title,
                        ])
            ]);
        }

        NavigationResource::navigationGroup("Settings");
        NavigationResource::navigationSort(1);

        Filament::registerNavigationGroups([
            'Post Management',
            'Content Management',
            'Event Management',
            'Custom Content',
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

        Livewire::component('media-library-picker', MediaLibraryPicker::class);

        Livewire::component('rich-editor-block', RichEditorBlock::class);
        Livewire::component('image-block', ImageBlock::class);
        Livewire::component('testimonial-block', TestimonialBlock::class);
        Livewire::component('buttons-block', ButtonsBlock::class);
        Livewire::component('call-to-action-block', CallToActionBlock::class);
        Livewire::component('event-block', EventBlock::class);
        Livewire::component('project-block', ProjectBlock::class);
        Livewire::component('gallery-block', GalleryBlock::class);
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
