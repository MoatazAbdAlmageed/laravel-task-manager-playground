<?php

namespace App\Filament\Resources\Employees\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmployeesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('father_name')
                    ->searchable(),
                TextColumn::make('cnic')
                    ->searchable(),
                TextColumn::make('address')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('mobile')
                    ->searchable(),
                TextColumn::make('telephone')
                    ->searchable(),
                TextColumn::make('age')
                    ->searchable(),
                TextColumn::make('g_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('ms_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nationality')
                    ->searchable(),
                TextColumn::make('qualification1')
                    ->searchable(),
                TextColumn::make('qualification2')
                    ->searchable(),
                TextColumn::make('qualification3')
                    ->searchable(),
                TextColumn::make('experience')
                    ->searchable(),
                TextColumn::make('salary')
                    ->searchable(),
                TextColumn::make('skype')
                    ->searchable(),
                TextColumn::make('username')
                    ->searchable(),
                TextColumn::make('userpass')
                    ->searchable(),
                TextColumn::make('i_remk')
                    ->searchable(),
                TextColumn::make('dept_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('shift_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('inout_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('time')
                    ->searchable(),
                TextColumn::make('active')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('joining_date')
                    ->searchable(),
                TextColumn::make('deactive')
                    ->searchable(),
                TextColumn::make('timezone')
                    ->searchable(),
                TextColumn::make('alt_phone')
                    ->searchable(),
                TextColumn::make('alt_mobile')
                    ->searchable(),
                TextColumn::make('schedule_status')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('bank')
                    ->searchable(),
                TextColumn::make('branch_code')
                    ->searchable(),
                TextColumn::make('account_no')
                    ->searchable(),
                TextColumn::make('salary_amount')
                    ->searchable(),
                TextColumn::make('account_title')
                    ->searchable(),
                TextColumn::make('designation_id')
                    ->numeric()
                    ->sortable(),
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
