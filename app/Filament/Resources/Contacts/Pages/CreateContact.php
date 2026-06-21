<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use JeroenDesloovere\VCard\VCard;
use Milon\Barcode\DNS2D;
use Illuminate\Support\Facades\Storage;

class CreateContact extends CreateRecord
{
    protected static string $resource = ContactResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['contactId'] = (string) Str::orderedUuid();

        return $data;
    }

    protected function afterCreate(): void
    {
        $contact = $this->record;

        $vCardRaw = "BEGIN:VCARD\nVERSION:3.0\n"
            . "N:{$contact->last_name};{$contact->first_name}\n"
            . "FN:{$contact->first_name} {$contact->last_name}\n"
            . "ADR;TYPE=WORK,PREF:;;{$contact->st_address};{$contact->city_address};{$contact->province_address};{$contact->postcode_address};{$contact->country_address}\n"
            . "ORG:PT. Medquest Jaya Global\n"
            . "ROLE:{$contact->dept}\n"
            . "TITLE:{$contact->title}\n"
            . "TEL;TYPE=MOBILE:{$contact->phone_number}\n"
            . "TEL;TYPE=WORK:{$contact->phone_number2}\n"
            . "EMAIL:{$contact->email}\n"
            . "END:VCARD";

        $vcardObj = new VCard();
        $vcardObj->addName($contact->last_name, $contact->first_name);
        $vcardObj->addEmail($contact->email);
        $vcardObj->addAddress(null, null, $contact->st_address, $contact->city_address, $contact->province_address, $contact->postcode_address, $contact->country_address, 'WORK');
        $vcardObj->addPhoneNumber($contact->phone_number);
        $vcardObj->addPhoneNumber($contact->phone_number2);
        $vcardObj->addCompany('PT. Medquest Jaya Global');
        $vcardObj->addRole($contact->dept);
        $vcardObj->addJobtitle($contact->title);
        $vcfContent = $vcardObj->getOutput();

        $qr = new DNS2D();
        $qr = base64_decode($qr->getBarcodePNG($vCardRaw, 'QRCODE'));
        $barcodePath = 'img/vcard/' . $contact->contactId . '.png';
        Storage::disk('public')->put($barcodePath, $qr);

        $vcfPath = 'file/vcard/' . $contact->first_name . '_' . $contact->last_name . '.vcf';
        Storage::disk('public')->put($vcfPath, $vcfContent);

        $contact->update([
            'barcode' => $barcodePath,
            'file' => $vcfPath,
        ]);
    }
}
