<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'key' => 'APP_LOGO',
            'value' => '/assets/img/rj2.png',
        ]);
        Setting::create([
            'key' => 'APP_DIRECTION',
            'value' => 'Av. 16 de Septiembre s/n, Col.Centro | C.P. 24000 San Francisco de Campeche,Cam.'
        ]);
        Setting::create([
            'key' => 'APP_PHONE',
            'value' => '+52 981 123 4567'
        ]);
        Setting::create([
            'key' => 'APP_EMAIL',
            'value' => 'info@example.com'
        ]);
        Setting::create([
            'key' => 'FACEBOOK_URL',
            'value' => 'https://www.facebook.com/profile.php?id=100093289983939&mibextid=LQQJ4d'
        ]);
        Setting::create([
            'key' => 'INSTAGRAM_URL',
            'value' => 'https://www.instagram.com/rjxmcam?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=='
        ]);
    }

}
