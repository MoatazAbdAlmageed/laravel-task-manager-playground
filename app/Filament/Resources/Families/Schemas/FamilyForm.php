<?php

namespace App\Filament\Resources\Families\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FamilyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('parent_name'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('username'),
                TextInput::make('userpass'),
                TextInput::make('dept_id')
                    ->required()
                    ->numeric()
                    ->default(1002),
                TextInput::make('telephone')
                    ->tel(),
                TextInput::make('mobile'),
                TextInput::make('skype'),
                TextInput::make('fee'),
                TextInput::make('active')
                    ->required()
                    ->numeric()
                    ->default(11),
                TextInput::make('c_id')
                    ->numeric(),
                TextInput::make('city'),
                TextInput::make('m_id')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('date'),
                TextInput::make('currency_id')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('mode_id')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('belong'),
                TextInput::make('timezone')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('trial_date'),
                TextInput::make('regular_date'),
                TextInput::make('leave_date'),
                TextInput::make('deactivation_date'),
                TextInput::make('suspension_date'),
                TextInput::make('csr_id')
                    ->numeric(),
                TextInput::make('invoice_type')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('payment_cycle')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('order_num'),
                TextInput::make('real_fee')
                    ->required()
                    ->default('0'),
                TextInput::make('discount')
                    ->required()
                    ->default('0'),
                TextInput::make('group_id')
                    ->required()
                    ->default('Student Testing QS'),
                TextInput::make('group_new_id'),
                TextInput::make('rate')
                    ->required()
                    ->default('8'),
                TextInput::make('subscription')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('whats_email')
                    ->email()
                    ->required()
                    ->default('email'),
                TextInput::make('zoomaction')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }
}
