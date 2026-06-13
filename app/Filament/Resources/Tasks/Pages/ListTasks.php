<?php

namespace App\Filament\Resources\Tasks\Pages;

use App\Filament\Exports\TaskExporter;
use App\Filament\Imports\TaskImporter;
use App\Filament\Resources\Tasks\TaskResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;

class ListTasks extends ListRecords
{
    protected static string $resource = TaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $data['user_id'] = auth()->id();

                    return $data;
                }),
            ExportAction::make()
                ->exporter(TaskExporter::class),
            ImportAction::make()
                ->importer(TaskImporter::class),
        ];
    }
}
