<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class RecentContacts extends TableWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Contact::query()->latest()->limit(5)
            )
            ->columns([
                TextColumn::make('first_name'),
                TextColumn::make('last_name'),
                TextColumn::make('email'),
                TextColumn::make('phone_number'),
                TextColumn::make('created_at')
                    ->dateTime(),
            ]);
    }
}
