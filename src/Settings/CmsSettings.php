<?php

namespace Hup234design\FilamentCms\Settings;

use phpDocumentor\Reflection\Types\Integer;
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

    public $primary_header_menu_id;
    public $secondary_header_menu_id;
    public $primary_footer_menu_id;
    public $secondary_footer_menu_id;

    public static function group(): string
    {
        return 'cms';
    }
}
