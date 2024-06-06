<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\defaultWidget;

class WidgetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
