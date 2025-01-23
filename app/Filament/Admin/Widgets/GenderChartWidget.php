<?php

namespace App\Filament\Admin\Widgets;

use App\Models\BrgyInhabitant;
use Filament\Widgets\Widget;

class GenderChartWidget extends Widget
{
    protected static string $view = 'filament.admin.widgets.gender-chart-widget';

    public $chartData;

    public function mount(): void
    {
        $maleCount = BrgyInhabitant::where('sex', 'Male')->count();
        $femaleCount = BrgyInhabitant::where('sex', 'Female')->count();

        $this->chartData = [
            'datasets' => [
                [
                    'data' => [$maleCount, $femaleCount],
                    'backgroundColor' => ['#3490dc', '#e3342f'], // Blue for Male, Red for Female
                ],
            ],
            'labels' => ['Male', 'Female'],
        ];
    }
}