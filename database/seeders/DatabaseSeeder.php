<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\defaultWidget;
use App\Models\Dashboards;
use App\Models\dataBox;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminEmail = "test@test.com";

        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => $adminEmail,
            'password' => bcrypt('password'), 
        ]);
        User::factory()->create([
            'first_name' => 'Marc',
            'last_name' => 'Vroegh',
            'email' => 'vroeghmarc@gmail.com',
            'password' => bcrypt('password'), 
        ]);

        defaultWidget::create([
            'title' => 'Temperatuur',
            'icon' => 'bi-thermometer-half',
            'value' => '18',
            'unit' => 'graden', 
        ]);

        defaultWidget::create([
            'title' => 'Luchtvochtigheid',
            'icon' => 'bi-cloud-fill',
            'value' => '55',
            'unit' => 'procent', 
        ]);

        defaultWidget::create([
            'title' => 'Koolstofdioxide',
            'icon' => 'bi-cloud-download-fill',
            'value' => '72',
            'unit' => 'ppm', 
        ]);

        defaultWidget::create([
            'title' => 'Geluidsterkte',
            'icon' => 'bi-speedometer2',
            'value' => '55',
            'unit' => 'dB', 
        ]);

        defaultWidget::create([
            'title' => 'Lichtsterkte',
            'icon' => 'bi-lightbulb-fill',
            'value' => '400',
            'unit' => 'lumen', 
        ]);

        Dashboards::create([
            'name' => 'Dashboard',
            'user_id' => '1', 
        ]);

        dataBox::create([
            'email' => $adminEmail,
            'temp' => '27', 
            'lvh' => '45', 
            'ppm' => '48', 
            'db' => '78', 
            'lumen' => '999'
        ]);
    }
}
