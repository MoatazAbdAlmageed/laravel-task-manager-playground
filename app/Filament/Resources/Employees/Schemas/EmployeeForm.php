<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                TextInput::make('father_name'),
                TextInput::make('cnic'),
                TextInput::make('address'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('mobile'),
                TextInput::make('telephone')
                    ->tel(),
                TextInput::make('age'),
                TextInput::make('g_id')
                    ->numeric(),
                TextInput::make('ms_id')
                    ->numeric(),
                TextInput::make('nationality'),
                TextInput::make('qualification1'),
                TextInput::make('qualification2'),
                TextInput::make('qualification3'),
                TextInput::make('experience'),
                TextInput::make('salary'),
                TextInput::make('skype'),
                TextInput::make('username'),
                TextInput::make('userpass'),
                TextInput::make('i_remk'),
                TextInput::make('dept_id')
                    ->numeric(),
                TextInput::make('shift_id')
                    ->numeric(),
                TextInput::make('inout_id')
                    ->numeric(),
                TextInput::make('time'),
                TextInput::make('active')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('joining_date'),
                TextInput::make('deactive'),
                TextInput::make('timezone'),
                TextInput::make('alt_phone')
                    ->tel(),
                TextInput::make('alt_mobile'),
                TextInput::make('schedule_status')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('bank'),
                TextInput::make('branch_code'),
                TextInput::make('account_no'),
                TextInput::make('salary_amount'),
                TextInput::make('account_title'),
                Select::make('designation_id')
                    ->relationship('designation', 'name')
                    ->searchable()
                    ->preload(),
            ]);
    }
}
