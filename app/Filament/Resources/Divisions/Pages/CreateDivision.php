<?php

namespace App\Filament\Resources\Divisions\Pages;

use App\Filament\Resources\Divisions\DivisionResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateDivision extends CreateRecord
{
    protected static string $resource = DivisionResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Division created successfully';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['divisionId'] = (string) Str::orderedUuid();

        return $data;
    }
}
