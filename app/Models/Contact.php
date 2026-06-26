<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use JeroenDesloovere\VCard\VCard;
use Milon\Barcode\DNS2D;

class Contact extends Model
{
    protected $guarded = ['id'];

    public function scopeSearch($query, $value)
    {
        $query->where('first_name', 'like', "%{$value}%")
            ->orWhere('last_name', 'like', "%{$value}%")
            ->orWhere('email', 'like', "%{$value}%")
            ->orWhere('phone_number', 'like', "%{$value}%");
    }

    public function regenerateBarcodeAndVcard(): void
    {
        $vCardRaw = "BEGIN:VCARD\nVERSION:3.0\n"
            ."N:{$this->last_name};{$this->first_name}\n"
            ."FN:{$this->first_name} {$this->last_name}\n"
            ."ADR;TYPE=WORK,PREF:;;{$this->st_address};{$this->city_address};{$this->province_address};{$this->postcode_address};{$this->country_address}\n"
            ."ORG:PT. Medquest Jaya Global\n"
            ."ROLE:{$this->dept}\n"
            ."TITLE:{$this->title}\n"
            ."TEL;TYPE=MOBILE:{$this->phone_number}\n"
            ."TEL;TYPE=WORK:{$this->phone_number2}\n"
            ."EMAIL:{$this->email}\n"
            .'END:VCARD';

        $vcardObj = new VCard;
        $vcardObj->addName($this->last_name, $this->first_name);
        $vcardObj->addEmail($this->email);
        $vcardObj->addAddress(null, null, $this->st_address, $this->city_address, $this->province_address, $this->postcode_address, $this->country_address, 'WORK');
        $vcardObj->addPhoneNumber($this->phone_number);
        $vcardObj->addPhoneNumber($this->phone_number2);
        $vcardObj->addCompany('PT. Medquest Jaya Global');
        $vcardObj->addRole($this->dept);
        $vcardObj->addJobtitle($this->title);
        $vcfContent = $vcardObj->getOutput();

        $qr = new DNS2D;
        $qr = base64_decode($qr->getBarcodePNG($vCardRaw, 'QRCODE'));
        $barcodePath = 'img/vcard/'.$this->contactId.'.png';
        Storage::disk('public')->put($barcodePath, $qr);

        $vcfPath = 'file/vcard/'.$this->first_name.'_'.$this->last_name.'.vcf';
        Storage::disk('public')->put($vcfPath, $vcfContent);

        $this->update([
            'barcode' => $barcodePath,
            'file' => $vcfPath,
        ]);
    }
}
