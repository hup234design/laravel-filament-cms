<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddNavigationSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('cms.primary_header_menu_id', "");
        $this->migrator->add('cms.secondary_header_menu_id', "");
        $this->migrator->add('cms.primary_footer_menu_id', "");
        $this->migrator->add('cms.secondary_footer_menu_id', "");
    }
}
