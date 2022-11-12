<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{

    public function up(): void
    {
        $this->migrator->add('general.title', 'Настройки');
        $this->migrator->add('general.site_name', 'Семейная прогрессивная школа «Счастливые дети»');
        $this->migrator->add('general.site_description', 'Школа для жизни');
        $this->migrator->add('general.phone', '+7 (3452) 91-65-66');
        $this->migrator->add('general.whatsapp', 'https://wa.me/79048738273');
        $this->migrator->add('general.telegram', '#');
        $this->migrator->add('general.vk', 'https://vk.com/happykids_tmn');
        $this->migrator->add('general.address', 'г. Тюмень, ул. Депутатская, 80 к.2');
        $this->migrator->add('general.email', 'happy_centre@mail.ru');
        $this->migrator->add('general.inn', 'ИП Граф К.С. | ОГРНИП 318723200068749 | ИНН 720413987662');
        $this->migrator->add('general.schedule', 'Мы открыты: 08:30 – 19:30');
        $this->migrator->add('general.og_image', '');
    }
}
