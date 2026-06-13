<?php

namespace App\Filament\Resources\Families\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FamiliesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('parent_name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('username')
                    ->searchable(),
                TextColumn::make('userpass')
                    ->searchable(),
                TextColumn::make('dept_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('telephone')
                    ->searchable(),
                TextColumn::make('mobile')
                    ->searchable(),
                TextColumn::make('skype')
                    ->searchable(),
                TextColumn::make('fee')
                    ->searchable(),
                TextColumn::make('active')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('c_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('city')
                    ->searchable(),
                TextColumn::make('m_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('date')
                    ->searchable(),
                TextColumn::make('currency_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('mode_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('belong')
                    ->searchable(),
                TextColumn::make('timezone')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('trial_date')
                    ->searchable(),
                TextColumn::make('regular_date')
                    ->searchable(),
                TextColumn::make('leave_date')
                    ->searchable(),
                TextColumn::make('deactivation_date')
                    ->searchable(),
                TextColumn::make('suspension_date')
                    ->searchable(),
                TextColumn::make('csr_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('invoice_type')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('payment_cycle')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('order_num')
                    ->searchable(),
                TextColumn::make('real_fee')
                    ->searchable(),
                TextColumn::make('discount')
                    ->searchable(),
                TextColumn::make('group_id')
                    ->searchable(),
                TextColumn::make('group_new_id')
                    ->searchable(),
                TextColumn::make('rate')
                    ->searchable(),
                TextColumn::make('subscription')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('whats_email')
                    ->searchable(),
                TextColumn::make('zoomaction')
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
