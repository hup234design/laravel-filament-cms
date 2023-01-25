<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateCmsSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('cms.site_name', config('app.name'));
        $this->migrator->add('cms.site_active', true);
        $this->migrator->add('cms.posts_slug', 'posts');
        $this->migrator->add('cms.posts_title', 'Posts');
        $this->migrator->add('cms.services_slug', 'services');
        $this->migrator->add('cms.services_title', 'Services');
        $this->migrator->add('cms.events_slug', 'events');
        $this->migrator->add('cms.events_title', 'Events');
        $this->migrator->add('cms.testimonials_slug', 'testimonials');
        $this->migrator->add('cms.testimonials_title', 'Testimonials');
        $this->migrator->add('cms.projects_slug', 'projects');
        $this->migrator->add('cms.projects_title', 'Projects');
    }

    public function down(): void
    {
        $this->migrator->delete('cms.projects_title');
        $this->migrator->delete('cms.projects_slug');
        $this->migrator->delete('cms.testimonials_title');
        $this->migrator->delete('cms.testimonials_slug');
        $this->migrator->delete('cms.events_title');
        $this->migrator->delete('cms.events_slug');
        $this->migrator->delete('cms.services_title');
        $this->migrator->delete('cms.services_slug');
        $this->migrator->delete('cms.posts_title');
        $this->migrator->delete('cms.posts_slug');
        $this->migrator->delete('cms.site_active');
        $this->migrator->delete('cms.site_name');
    }
}
