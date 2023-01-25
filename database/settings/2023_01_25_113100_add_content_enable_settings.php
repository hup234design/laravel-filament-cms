<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddContentEnableSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('cms.services_enabled', true);
        $this->migrator->add('cms.events_enabled', true);
        $this->migrator->add('cms.projects_enabled', true);
    }

    public function down(): void
    {
        $this->migrator->delete('cms.projects_enabled');
        $this->migrator->delete('cms.events_enabled');
        $this->migrator->delete('cms.services_enabled');
    }
}
