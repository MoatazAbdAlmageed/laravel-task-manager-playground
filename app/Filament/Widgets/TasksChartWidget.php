<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class TasksChartWidget extends ChartWidget
{
    protected ?string $heading = 'Task Status Distribution';

    protected function getData(): array
    {
        $completed = \App\Models\Task::where('is_completed', true)->count();
        $pending = \App\Models\Task::where('is_completed', false)->count();

        return [
            'datasets' => [
                [
                    'label' => 'Tasks',
                    'data' => [$completed, $pending],
                    'backgroundColor' => ['#10b981', '#f59e0b'],
                ],
            ],
            'labels' => ['Completed', 'Pending'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
