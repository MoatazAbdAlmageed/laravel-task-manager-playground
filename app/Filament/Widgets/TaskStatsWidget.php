<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TaskStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Tasks', \App\Models\Task::count())
                ->description('All tasks in the system')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('primary'),
            Stat::make('Completed Tasks', \App\Models\Task::where('is_completed', true)->count())
                ->description('Tasks marked as done')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('Pending Tasks', \App\Models\Task::where('is_completed', false)->count())
                ->description('Tasks awaiting completion')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
        ];
    }
}
