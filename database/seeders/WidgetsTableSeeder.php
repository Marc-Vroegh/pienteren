<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'title' => 'Temprature',
            'icon' => 'bi-thermometer',
            'value' => 10,
            'unit' => 'celsius',
        ]);

        defaultWidget::create([
            'title' => 'Humidty',
            'icon' => 'bi-moisture',
            'value' => 20,
            'unit' => '%',
        ]);
    }
}
