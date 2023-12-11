<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\News;
use Filament\Widgets\ChartWidget;

class NewsWidget extends ChartWidget
{
    protected static ?string $heading = 'News Statistics';
    protected static ?int $sort = 3;
    protected function getData(): array
    {
        $news = News::select('created_at', 'id')->get()->groupBy(function ($news) {
            return Carbon::parse($news->created_at)->format('M');
        });
        $newsCount = [];
        foreach ($news as $onenews => $newsGroup) {
            $newsCount[$onenews] = $newsGroup->count();
        }


        $labels = array_keys($newsCount);
        $data = array_values($newsCount);
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'News',
                    'data' => $data,
                    'backgroundColor' =>  [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    'borderColor' =>  [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    'borderWidth' =>  1
                ],

            ],

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
