<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreatePolicySettings extends SettingsMigration
{

    public function up(): void
    {
        $this->migrator->add('policy.title', 'Политика конфиденциальности');
        $this->migrator->add('policy.text', 'Текст политики конфиденциальности');
    }
}
