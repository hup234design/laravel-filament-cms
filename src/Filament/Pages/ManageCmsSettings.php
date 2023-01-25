<?php

namespace Hup234design\FilamentCms\Filament\Pages;

use Filament\Forms;
use Filament\Pages\SettingsPage;
use Hup234design\FilamentCms\Settings\CmsSettings;

class ManageCmsSettings extends SettingsPage
{
    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = CmsSettings::class;

    protected static ?string $title       = 'Settings';

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Tabs::make('Settings')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('General')
                        ->schema([
                            Forms\Components\Group::make()
                                ->schema([
                                    Forms\Components\TextInput::make('site_name')
                                        ->label('Site Name')
                                        ->default(config('app.name'))
                                        ->required(),
                                    Forms\Components\Toggle::make('site_active')
                                        ->label('Site Active')
                                        ->default(true),
                                ])
                        ]),
                    Forms\Components\Tabs\Tab::make('Services')
                        ->schema([
                            Forms\Components\Toggle::make('services_enabled')
                                ->label('Enabled')
                                ->default(true),
                            Forms\Components\TextInput::make('services_title')
                                ->label('Title')
                                ->required(),
                            Forms\Components\TextInput::make('services_slug')
                                ->label('Slug')
                                ->required(),
                        ]),
                    Forms\Components\Tabs\Tab::make('Projects')
                        ->schema([
                            Forms\Components\Toggle::make('projects_enabled')
                                ->label('Enabled')
                                ->default(true),
                            Forms\Components\TextInput::make('projects_title')
                                ->label('Title')
                                ->required(),
                            Forms\Components\TextInput::make('projects_slug')
                                ->label('Slug')
                                ->required(),
                        ]),
                    Forms\Components\Tabs\Tab::make('Testimonials')
                        ->schema([
                            Forms\Components\TextInput::make('testimonials_title')
                                ->label('Title')
                                ->required(),
                            Forms\Components\TextInput::make('testimonials_slug')
                                ->label('Slug')
                                ->required(),
                        ]),
                    Forms\Components\Tabs\Tab::make('Events')
                        ->schema([
                            Forms\Components\Toggle::make('events_enabled')
                                ->label('Enabled')
                                ->default(true),
                            Forms\Components\TextInput::make('events_title')
                                ->label('Title')
                                ->required(),
                            Forms\Components\TextInput::make('events_slug')
                                ->label('Slug')
                                ->required(),
                        ]),
                    Forms\Components\Tabs\Tab::make('Posts')
                        ->schema([
                            Forms\Components\TextInput::make('posts_title')
                                ->label('Title')
                                ->required(),
                            Forms\Components\TextInput::make('posts_slug')
                                ->label('Slug')
                                ->required(),
                        ]),
                ])
                ->columnSpan(2)

        ];
    }

}
