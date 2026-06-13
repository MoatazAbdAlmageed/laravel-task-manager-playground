<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                Select::make('family_id')
                    ->relationship('family', 'parent_name')
                    ->searchable()
                    ->preload(),
                TextInput::make('dept_id')
                    ->numeric(),
                TextInput::make('adept_id')
                    ->required()
                    ->numeric()
                    ->default(108),
                DateTimePicker::make('date_of_joining')
                    ->required(),
                TextInput::make('skype_id'),
                TextInput::make('age'),
                TextInput::make('g_id')
                    ->numeric(),
                TextInput::make('lan_id')
                    ->numeric(),
                TextInput::make('c_id')
                    ->numeric(),
                TextInput::make('status'),
                TextInput::make('number_of_days'),
                TextInput::make('fee')
                    ->numeric(),
                TextInput::make('teacher_id')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('trial_class'),
                TextInput::make('remark_teacher'),
                TextInput::make('nature')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('m_id')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('active')
                    ->required()
                    ->numeric()
                    ->default(11),
                TextInput::make('tz_id')
                    ->numeric(),
                TextInput::make('timezone'),
                TextInput::make('time_name'),
                TextInput::make('date'),
                TextInput::make('php_tz'),
                TextInput::make('regular_date'),
                TextInput::make('csr_id')
                    ->numeric(),
                TextInput::make('rate'),
            ]);
    }
}
