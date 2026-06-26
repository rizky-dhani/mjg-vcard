<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactResource;
use App\Filament\Resources\Contacts\Schemas\ContactInfolist;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;

class ViewContact extends ViewRecord
{
    protected static string $resource = ContactResource::class;

    public function infolist(Schema $schema): Schema
    {
        return ContactInfolist::configure($schema);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('public_link')
                ->label('View Public Page')
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->url(fn (Model $record): string => route('contacts.detail', $record->contactId))
                ->openUrlInNewTab(),
        ];
    }
}
