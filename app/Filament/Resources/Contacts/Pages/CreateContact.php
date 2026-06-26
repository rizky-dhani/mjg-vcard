<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use JeroenDesloovere\VCard\VCard;
use Milon\Barcode\DNS2D;

class CreateContact extends CreateRecord
{
    protected static string $resource = ContactResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Contact created successfully';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['contactId'] = (string) Str::orderedUuid();

        $vCardRaw = "BEGIN:VCARD\nVERSION:3.0\n"
            ."N:{$data['last_name']};{$data['first_name']}\n"
            ."FN:{$data['first_name']} {$data['last_name']}\n"
            ."ADR;TYPE=WORK,PREF:;;{$data['st_address']};{$data['city_address']};{$data['province_address']};{$data['postcode_address']};{$data['country_address']}\n"
            ."ORG:PT. Medquest Jaya Global\n"
            ."ROLE:{$data['dept']}\n"
            ."TITLE:{$data['title']}\n"
            ."TEL;TYPE=MOBILE:{$data['phone_number']}\n"
            ."TEL;TYPE=WORK:{$data['phone_number2']}\n"
            ."EMAIL:{$data['email']}\n"
            .'END:VCARD';

        $vcardObj = new VCard;
        $vcardObj->addName($data['last_name'], $data['first_name']);
        $vcardObj->addEmail($data['email']);
        $vcardObj->addAddress(null, null, $data['st_address'], $data['city_address'], $data['province_address'], $data['postcode_address'], $data['country_address'], 'WORK');
        $vcardObj->addPhoneNumber($data['phone_number']);
        $vcardObj->addPhoneNumber($data['phone_number2']);
        $vcardObj->addCompany('PT. Medquest Jaya Global');
        $vcardObj->addRole($data['dept']);
        $vcardObj->addJobtitle($data['title']);
        $vcfContent = $vcardObj->getOutput();

        $qr = new DNS2D;
        $qr = base64_decode($qr->getBarcodePNG($vCardRaw, 'QRCODE'));
        $barcodePath = 'img/vcard/'.$data['contactId'].'.png';
        Storage::disk('public')->put($barcodePath, $qr);

        $vcfPath = 'file/vcard/'.$data['first_name'].'_'.$data['last_name'].'.vcf';
        Storage::disk('public')->put($vcfPath, $vcfContent);

        $data['barcode'] = $barcodePath;
        $data['file'] = $vcfPath;

        return $data;
    }
}
