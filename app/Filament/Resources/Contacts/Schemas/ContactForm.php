<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone_number2')
                    ->tel()
                    ->maxLength(255),
                \Filament\Forms\Components\Select::make('dept')
                    ->label('Department / Division')
                    ->options(\App\Models\Division::pluck('name', 'name'))
                    ->required(),
                TextInput::make('title')
                    ->label('Job Title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('st_address')
                    ->label('Street Address')
                    ->required()
                    ->maxLength(255),
                TextInput::make('city_address')
                    ->label('City')
                    ->required()
                    ->maxLength(255),
                TextInput::make('province_address')
                    ->label('Province')
                    ->required()
                    ->maxLength(255),
                TextInput::make('postcode_address')
                    ->label('Postal Code')
                    ->required()
                    ->maxLength(255),
                TextInput::make('country_address')
                    ->label('Country')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
