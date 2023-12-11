<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Volunteer;
use Filament\Widgets\ChartWidget;

class Volunteerwidget extends ChartWidget
{

    protected static ?string $heading = 'Volunteers';
    protected static ?int $sort = 5;

    protected function getData(): array
    {
        $volunteers = User::select('volunteer_category', 'id')->get()->groupBy(function ($volunteer) {
            return $volunteer->volunteer_category;
        });
        $volunteerCount = [];
        foreach ($volunteers as $onevolunteer => $volunteerGroup) {
            $volunteerCount[$onevolunteer] = $volunteerGroup->count();
        }
        $labels = array_keys($volunteerCount);
        $data = array_values($volunteerCount);
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'category',
                    'data' => $data,
                    'backgroundColor' =>  [
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 99, 132)'
                    ],
                    'hoverOffset' => 4
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
