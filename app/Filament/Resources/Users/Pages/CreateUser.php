<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'User created successfully';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['userId'] = (string) Str::orderedUuid();

        return $data;
    }

    protected function afterCreate(): void
    {
        $data = $this->form->getRawState();
        if (isset($data['role'])) {
            $this->record->syncRoles([$data['role']]);
        }
    }
}
