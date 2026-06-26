<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ContactInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('first_name'),
                TextEntry::make('last_name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('phone_number'),
                TextEntry::make('phone_number2'),
                TextEntry::make('dept')
                    ->label('Department / Division'),
                TextEntry::make('title')
                    ->label('Job Title'),
                TextEntry::make('st_address')
                    ->label('Street Address'),
                TextEntry::make('city_address')
                    ->label('City'),
                TextEntry::make('province_address')
                    ->label('Province'),
                TextEntry::make('postcode_address')
                    ->label('Postal Code'),
                TextEntry::make('country_address')
                    ->label('Country'),
                TextEntry::make('created_at')
                    ->dateTime(),
            ]);
    }
}
