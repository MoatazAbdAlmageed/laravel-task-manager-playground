<?php

namespace App\Filament\Resources\Students\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('family_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('dept_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('adept_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('date_of_joining')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('skype_id')
                    ->searchable(),
                TextColumn::make('age')
                    ->searchable(),
                TextColumn::make('g_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('lan_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('c_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->searchable(),
                TextColumn::make('number_of_days')
                    ->searchable(),
                TextColumn::make('fee')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('teacher_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('trial_class')
                    ->searchable(),
                TextColumn::make('remark_teacher')
                    ->searchable(),
                TextColumn::make('nature')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('m_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('active')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tz_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('timezone')
                    ->searchable(),
                TextColumn::make('time_name')
                    ->searchable(),
                TextColumn::make('date')
                    ->searchable(),
                TextColumn::make('php_tz')
                    ->searchable(),
                TextColumn::make('regular_date')
                    ->searchable(),
                TextColumn::make('csr_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('rate')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
