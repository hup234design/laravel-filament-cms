<?php

namespace Hup234design\FilamentCms\Settings;

use Spatie\LaravelSettings\Settings;

class CmsSettings extends Settings
{
    public string $site_name;
    public bool   $site_active;
    public string $posts_slug;
    public string $posts_title;
    public string $services_slug;
    public string $services_title;
    public string $projects_slug;
    public string $projects_title;
    public string $events_slug;
    public string $events_title;
    public string $testimonials_slug;
    public string $testimonials_title;
    public bool   $services_enabled;
    public bool   $projects_enabled;
    public bool   $events_enabled;

    public static function group(): string
    {
        return 'cms';
    }
}
