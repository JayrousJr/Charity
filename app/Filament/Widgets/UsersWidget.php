<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\User;
use Filament\Widgets\ChartWidget;

class UsersWidget extends ChartWidget
{
    protected static ?string $heading = 'Team Members';
    protected static ?int $sort = 6;
    protected function getData(): array
    {
        $users = User::select('created_at', 'id')->get()->groupBy(function ($user) {
            return Carbon::parse($user->created_at)->format('F');
        });
        $userCount = [];

        foreach ($users as $oneuser => $userGroup) {
            $userCount[$oneuser] = $userGroup->count();
        }

        $labels = array_keys($userCount);
        $data = array_values($userCount);

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'data' => $data,
                    'fill' => true,
                    'label' => 'Member',
                    'backgroundColor' =>
                    'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgb(255,99,132)',
                    'pointBackgroundColor' => '#fff',
                    'pointHoverBackgroundColor' => '#fff',
                    'pointHoverBorderColor' => 'rgb(255,99,132)',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'radar';
    }
}
